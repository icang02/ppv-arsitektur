<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visimisi;
use Illuminate\Support\Facades\Storage;

class VisimisiController extends Controller
{
    public function visimisi()
    {
        $visimisi = Visimisi::all();

        return view('admin.visi-misi', [
            "visimisi" => $visimisi,
            "title" => 'Visi & Misi'
        ]);
    }

    public function visimisiUpdate(Request $request, $id)
    {
        $data = Visimisi::find($id);
        $image = $data->image;

        if ($request->file('image')) {
            Storage::delete($data->image);
            $image = $request->file('image')->store('img-sliders');
        }

        $data->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image
        ]);
        return redirect('dashboard/visi-misi')->with('sukses', 'Data berhasil diupdate');
    }
}
