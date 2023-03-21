<?php

namespace App\Http\Controllers;

use App\Models\FotoPrestasi;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $data = Prestasi::paginate(8);
        // dd($data);
        return view('home.list-news', [
            'news' => $data,
            'kategory' => 'Prestasi'
        ]);
    }

    public function indexAdmin()
    {
        $artikel = Prestasi::all();
        return view('admin.artikel', [
            'artikel' => $artikel,
            'title' => 'Prestasi'
        ]);
    }

    public function prestasiForm($id = null)
    {
        if (isset($id)) {
            $data = Prestasi::find($id);
            return view('admin.form-artikel', [
                'data' => $data,
                // 'slug' => $slug
            ]);
        } else {
            return view('admin.form-artikel');
        }
    }

    public function prestasiStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'content' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('img-prestasi');
        }
        $prestasiId = DB::table('prestasi')->insertGetId([
            'title' => ucfirst($request->title),
            'slug' => uniqid() . '-' . str()->slug($request->title),
            'date' => $request->date,
            'image' => $image ?? NULL,
            'content' => $request->content
        ]);

        $fotos = $request->file('foto');
        foreach ($fotos as $foto) {
            $img = $foto->store('foto-prestasi');

            FotoPrestasi::create([
                'prestasi_id' => $prestasiId,
                'foto' => $img,
            ]);
        }

        return redirect("dashboard/prestasi")->with('success', 'Data berhasil ditambahkan.');
    }

    public function prestasiUpdate(Request $request, $id)
    {
        $data = Prestasi::findOrFail($id);
        $image = $data->image;

        if ($request->file('image')) {
            if ($data->image != NULL) {
                Storage::delete($data->image);
            }
            $image = $request->file('image')->store('img-news');
        }

        $data->update([
            'title' => ucfirst($request->title),
            'slug' => uniqid() . '-' . str()->slug($request->title),
            'date' => $request->date,
            'image' => $image,
            'content' => $request->content
        ]);

        if ($request->has('foto')) {
            $fotos = $request->file('foto');
            foreach ($fotos as $foto) {
                $img = $foto->store('foto-prestasi');

                FotoPrestasi::create([
                    'prestasi_id' => $data->id,
                    'foto' => $img,
                ]);
            }
        }

        return redirect("dashboard/prestasi")->with('success', 'Data berhasil diupdate.');
    }

    public function prestasiDestroy(Prestasi $prestasi)
    {
        if ($prestasi->foto_prestasi->count() != 0) {
            foreach ($prestasi->foto_prestasi as $item) {
                Storage::delete($item->foto);
                $item->delete();
            }
        }

        if ($prestasi->image != null) Storage::delete($prestasi->image);
        $prestasi->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function prestasiDetail(Prestasi $prestasi)
    {
        $allnews = Prestasi::take(4)->get();

        return view('home.detail-news', [
            'news' => $prestasi,
            'allnews' => $allnews
        ]);
    }
}
