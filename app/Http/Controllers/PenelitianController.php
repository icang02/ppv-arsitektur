<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
  public function index()
  {
    if (request()->is('penelitian')) {
      $data = Penelitian::where('kategori', 'penelitian')->get();
      $title = 'Penelitian';
    } else if (request()->is('pengabdian')) {
      $data = Penelitian::where('kategori', 'pengabdian')->get();
      $title = 'Pengabdian';
    }

    return view('home.penelitian', [
      'title' => $title,
      'data' => $data,
    ]);
  }

  // INDEX ADMIN
  public function indexAdmin()
  {
    return view('admin.penelitian.penelitian', [
      'title' => 'Penelitian',
      'data' => Penelitian::all(),
    ]);
  }

  public function create()
  {
    return view('admin.penelitian.create', [
      'title' => 'Penelitian'
    ]);
  }

  public function store(Request $request)
  {
    Penelitian::create([
      'judul' => $request->judul,
      'nama_dosen' => $request->nama_dosen,
      'tahun' => $request->tahun,
      'link' => $request->link,
      'kategori' => $request->kategori,
    ]);
    return back()->with('success', 'Penelitian berhasil ditambahkan.');
  }

  public function edit(Penelitian $penelitian)
  {
    return view('admin.penelitian.edit', [
      'title' => 'Penelitian',
      'penelitian' => $penelitian,
    ]);
  }

  public function update(Request $request, Penelitian $penelitian)
  {
    $penelitian->update([
      'judul' => $request->judul,
      'nama_dosen' => $request->nama_dosen,
      'tahun' => $request->tahun,
      'link' => $request->link,
      'kategori' => $request->kategori,
    ]);
    return redirect('dashboard/penelitian')->with('success', 'Data penelitian berhasil diupdate.');
  }

  public function destroy(Penelitian $penelitian)
  {
    $penelitian->delete();
    return redirect('dashboard/penelitian')->with('success', 'Data penelitian berhasil dihapus.');
  }
}
