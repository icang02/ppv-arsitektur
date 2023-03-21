<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function index()
    {
        $data = Sponsor::all();
        return view('admin.sponsor', [
            'sponsors' => $data,
            'title' => 'Mitra',
        ]);
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->store('sponsor');

        Sponsor::create([
            'nama' => ucfirst($request->nama),
            'image' => $image,
        ]);
        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        if ($sponsor->image != null) {
            Storage::delete($sponsor->image);
        }

        $sponsor->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $image = $sponsor->image;

        if ($request->file('image')) {
            Storage::delete($sponsor->image);
            $image = $request->file('image')->store('sponsor');
        }

        $sponsor->update([
            'nama' => ucfirst($request->nama),
            'image' => $image,
        ]);
        return back()->with('success', 'Data berhasil diupdate.');
    }
}
