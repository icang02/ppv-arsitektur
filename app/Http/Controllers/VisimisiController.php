<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visimisi;

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

        $data->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return redirect('dashboard/visi-misi')->with('sukses', 'Data berhasil diupdate');
    }
}
