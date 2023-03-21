<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function link()
    {
        $links = Link::all();

        return view('admin.links', [
            "links" => $links,
            'title' => 'Link Terkait'
        ]);
    }

    public function linkUpdate(Request $request, $id)
    {
        $data = Link::find($id);

        $data->update([
            'name' => $request->name,
            'url' => $request->url
        ]);
        return redirect('dashboard/links')->with('success', 'Data berhasil diupdate.');
    }
}
