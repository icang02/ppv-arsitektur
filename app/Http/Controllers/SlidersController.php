<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    public function sliders()
    {
        $sliders = Sliders::all();
        return view('admin.sliders', [
            "sliders" => $sliders,
            'title' => 'Sliders'
        ]);
    }

    public function slidersStore(Request $request)
    {
        $image = $request->file('image')->store('img-sliders');
        Sliders::Create([
            'image' => $image
        ]);
        return redirect('dashboard/sliders')->with('success', 'Data berhasil ditambahkan.');
    }

    public function slidersUpdate(Request $request, $id)
    {
        $data = Sliders::find($id);
        $image = $data->image;

        if ($request->file('image')) {
            Storage::delete($data->image);
            $image = $request->file('image')->store('img-sliders');
        }

        $data->update([
            'image' => $image
        ]);
        return redirect('dashboard/sliders')->with('success', 'Data berhasil diupdate.');
    }

    public function slidersDelete($id)
    {
        $data = Sliders::find($id);

        if ($data->image != null) {
            Storage::delete($data->image);
        }

        $data->delete();
        return redirect('dashboard/sliders')->with('success', 'Data berhasil dihapus.');
    }
}
