<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
    }else if (request()->is('download')) {
      $data = Penelitian::where('kategori', 'download')->get();
      $title = 'Download';
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
      'data' => Penelitian::whereIn('kategori', ['penelitian', 'pengabdian'])->get(),
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

  public function destroy($id)
  {
    $penelitian= Penelitian::findOrFail($id);
    $penelitian->delete();
    return back()->with('success', 'Data penelitian berhasil dihapus.');
  }

  public function indexDownload()
  {
    return view('admin.download.download', [
      'title' => 'Download',
      'data' => Penelitian::where('kategori', 'download')->get(),
    ]);
  }

  public function createDownload()
  {
    return view('admin.download.create', [
      'title' => 'Download'
    ]);
  }

  public function storeDownload(Request $request)
  {
    $link = $request->file('link')->store('file-download');
    Penelitian::create([
      'judul' => $request->judul,
      'link' => $link,
      'kategori' => $request->kategori,
    ]);
    return redirect("dashboard/download")->with('success', 'Penelitian berhasil ditambahkan.');
  }

  public function editDownload(Penelitian $download)
  {
    return view('admin.download.edit', [
      'title' => 'Download',
      'download' => $download,
    ]);
  }

  public function updateDownload(Request $request, Penelitian $download)
  {

    $link = $download->link;

    if ($request->file('link')) {
      if($link!==null) {
        Storage::delete($download->link);
      }
      $link = $request->file('link')->store('file-download');
    }

    $download->update([
      'judul' => $request->judul,
      'link' => $link,
      'kategori' => $request->kategori,
    ]);
    return redirect('dashboard/download')->with('success', 'Data penelitian berhasil diupdate.');
  }
}
