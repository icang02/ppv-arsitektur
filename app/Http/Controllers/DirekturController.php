<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direktur;
use Illuminate\Support\Facades\Storage;

class DirekturController extends Controller
{
    public function direktur()
    {
        $direktur = Direktur::all();

        return view('admin.direktur', [
            "direktur" => $direktur,
            'title' => 'Direktur'
        ]);
    }

    public function direkturUpdate(Request $request, $id)
    {
        $data = Direktur::find($id);
        $image = $data->image;

        if ($request->file('image')) {
            Storage::delete($data->image);
            $image = $request->file('image')->store('img-direktur');
        }

        $data->update([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $image
        ]);
        return redirect('dashboard/direktur')->with('sukses', 'Data berhasil diupdate');
    }
}
