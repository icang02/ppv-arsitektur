<?php

namespace App\Http\Controllers;

use App\Models\Sliders;
use App\Models\Direktur;
use App\Models\Visimisi;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Link;
use App\Models\Sponsor;

class IndexController extends Controller
{
  public function index()
  {
    $sliders = Sliders::all();
    $direktur = Direktur::all();
    $visimisi = Visimisi::all();
    $gallery = Gallery::take(8)->get();
    $news = News::whereIn('kategory', ['berita','pengumuman','agenda'])->orderBy('date', 'desc')->take(6)->get();
    $kerjasama = Sponsor::all();

    return view('home.index', [
      "sliders" => $sliders,
      "direktur" => $direktur,
      "visimisi" => $visimisi,
      "gallery" => $gallery,
      "news" => $news,
      "kerjasama" => $kerjasama
      // 'title' => 'Program Pendidikan Vokasi'
    ]);
  }

  public function dashboard()
  {
    $news = News::count();
    $gallery = Gallery::count();
    $link = Link::count();

    return view('admin.index', [
      "link" => $link,
      "gallery" => $gallery,
      "news" => $news,
      'title' => 'Dashboard Program Pendidikan Vokasi'
    ]);
  }
}
