<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\FotoFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $data = Fasilitas::all();
        return view('admin.fasilitas.fasilitas', [
            'title' => 'Fasilitas',
            'fasilitas' => $data,
        ]);
    }

    public function edit($id)
    {
        $data = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', [
            'title' => 'Edit Fasilitas',
            'fasilitas' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $path = 'fasilitas/' . str()->slug($fasilitas->nama);

        if ($request->hasFile('foto_fasilitas')) {
            foreach ($request->file('foto_fasilitas') as $item) {
                $fotoFasilitas = $item->store($path);
                FotoFasilitas::create([
                    'fasilitas_id' => $fasilitas->id,
                    'foto' => $fotoFasilitas,
                ]);
            }
        }

        // dd($request->all());

        $foto = $fasilitas->foto;
        if ($request->hasFile('foto_kepala')) {
            $foto = $request->file('foto_kepala')->store('fasilitas/kepala');
        }

        if ($request->has('kepala') && $request->has('nip')) {
            $kepala = $request->kepala;
            $nip = $request->nip;
        }

        if ($request->jenis_fasilitas == 0) {
            $kepala = null;
            $foto = null;
            $nip = null;
            if ($fasilitas->foto != null) Storage::delete($fasilitas->foto);
        }

        $fasilitas->update([
            'nama' => ucfirst($request->nama),
            'kepala' => $kepala,
            'nip' => $nip,
            'foto' => $foto,
            'is_lab' => $request->jenis_fasilitas,
        ]);

        return redirect('dashboard/fasilitas/edit/' . $fasilitas->id)->with('success', 'Data berhasil diupdate.');
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        if ($request->has('kepala') && $request->hasFile('foto_kepala') && $request->has('nip')) {
            $kepala = $request->kepala;
            $foto = $request->file('foto_kepala')->store('fasilitas/kepala');
            $nip = $request->nip;
        }

        $id = DB::table('fasilitas')->insertGetId([
            'nama' => ucfirst($request->nama),
            'kepala' => $kepala ?? null,
            'nip' => $nip ?? null,
            'foto' => $foto ?? null,
            'is_lab' => $request->jenis_fasilitas,
        ]);

        foreach ($request->foto_fasilitas as $item) {
            $foto = $item->store('fasilitas/' . str()->slug($request->nama));

            FotoFasilitas::create([
                'fasilitas_id' => $id,
                'foto' => $foto,
            ]);
        }

        return redirect('dashboard/fasilitas')->with('success', 'Data berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $path = 'fasilitas/' . str()->slug($fasilitas->nama);

        if ($fasilitas->foto != null) Storage::delete($fasilitas->foto);

        if ($fasilitas->foto_fasilitas->count() != 0) {
            foreach ($fasilitas->foto_fasilitas as $item) {
                Storage::delete($item->foto);
                $item->delete();
            }
        }
        Storage::deleteDirectory($path);
        $fasilitas->delete();
        return redirect('dashboard/fasilitas')->with('success', 'Data berhasil dihapus.');
    }

    public function destroyFoto($id, $fasilitas_id)
    {
        $fasilitas = FotoFasilitas::findOrFail($id);
        $id = $fasilitas->fasilitas->id;
        $path = "fasilitas/" . str()->slug($fasilitas->fasilitas->nama);

        if ($fasilitas->foto != null) Storage::delete($fasilitas->foto);
        $fasilitas->delete();

        $cekFoto = FotoFasilitas::where('fasilitas_id', $fasilitas_id)->count();
        if ($cekFoto == 0) Storage::deleteDirectory($path);

        return redirect('dashboard/fasilitas/edit/' . $id)->with('success', 'Data berhasil dihapus.');
    }

    public function storeFoto(Request $request)
    {
        dd($request->all());
    }

    public function detailFasilitas($id)
    {
        $data = Fasilitas::findOrFail($id);
        $foto = FotoFasilitas::where('fasilitas_id', $id)->get();
        $title = $data->nama;

        return view('home.fasilitas', [
            'fasilitas' => $data,
            'foto' => $foto,
            'title' => $title
        ]);
    }
}
