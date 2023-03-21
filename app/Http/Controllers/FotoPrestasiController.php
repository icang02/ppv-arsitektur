<?php

namespace App\Http\Controllers;

use App\Models\FotoPrestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoPrestasiController extends Controller
{
    public function index($id)
    {
        $data = FotoPrestasi::where('prestasi_id', $id)->get();
        // dd($data->count() == 0);
        if ($data->count() == 0)  return redirect("dashboard/prestasi/form/" . $id)->with('success', 'Foto berhasil dihapus.');

        return view('admin.prestasi', [
            'fotos' => $data,
            'title' => 'Prestasi'
        ]);
    }

    public function store(Request $request)
    {
        $fotos = $request->file('foto');
        foreach ($fotos as $foto) {
            $img = $foto->store('foto-prestasi');

            FotoPrestasi::create([
                'prestasi_id' => $request->prestasiId,
                'foto' => $img,
            ]);
        }
        return back()->with('success', 'Unggah foto berhasil.');
    }

    public function destroy(FotoPrestasi $foto)
    {
        Storage::delete($foto->foto);
        $foto->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
