<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();

        return view('home.gallery', [
            "gallery" => $gallery,
        ]);
    }

    public function gallery()
    {
        $gallery = Gallery::all();
        return view('admin.gallery', [
            "gallery" => $gallery,
            'title' => 'Gallery'
        ]);
    }

    public function galleryStore(Request $request)
    {
        $image = $request->file('image')->store('img-gallery');
        Gallery::Create([
            'caption' => $request->caption,
            'kategory' => $request->kategory,
            'image' => $image
        ]);
        return redirect('dashboard/gallery')->with('success', 'Data berhasil ditambahkan.');
    }

    public function galleryUpdate(Request $request, $id)
    {
        $data = Gallery::find($id);
        $image = $data->image;

        if ($request->file('image')) {
            Storage::delete($data->image);
            $image = $request->file('image')->store('img-gallery');
        }

        $data->update([
            'caption' => $request->caption,
            'kategory' => $request->kategory,
            'image' => $image
        ]);
        return redirect('dashboard/gallery')->with('success', 'Data berhasil diupdate.');
    }

    public function galleryDelete($id)
    {
        $data = Gallery::find($id);

        if ($data->image != null) {
            Storage::delete($data->image);
        }

        $data->delete();
        return redirect('dashboard/gallery')->with('success', 'Data berhasil dihapus.');
    }
}
