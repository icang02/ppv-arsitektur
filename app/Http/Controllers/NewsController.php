<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //HALAMAN DEPAN
    public function index($kategory)
    {
        $data = News::where('kategory', $kategory)->orderBy('date', 'desc')->paginate(9);
        // dd($data);
        return view('home.list-news', [
            'news' => $data,
            'kategory' => $kategory,
            'menu' => 'berita'
        ]);
    }

    public function newsDetail($kategory, $slug)
    {
        $data = News::where('slug', $slug)->firstOrFail();
        $data->increment('views');
        $allnews = News::whereIn('kategory', ['berita','pengumuman','agenda'])->orderBy('date', 'desc')->take(4)->get();

        // dd($data);  
        return view('home.detail-news', [
            'news' => $data,
            'allnews' => $allnews,
            'kategori' => str()->title($kategory),
        ]);
    }

    // public function indexPengumuman($kategory)
    // {
    //     $data = News::where('kategory', $kategory)->paginate(9);
    //     // dd($data);
    //     return view('home.list-news', [
    //         'news' => $data,
    //         'kategory' => $kategory,
    //         'menu' => 'pengumuman'
    //     ]);
    // }

    // public function pengumumanDetail($kategory, $slug)
    // {
    //     $data = News::where('slug', $slug)->firstOrFail();
    //     $data->increment('views');
    //     $allnews = News::whereIn('kategory', ['jadwal_ujian','seminar','kuliah_umum'])->orderBy('date', 'desc')->take(4)->get();

    //     // dd($data);  
    //     return view('home.detail-news', [
    //         'news' => $data,
    //         'allnews' => $allnews,
    //         'kategori' => str()->title($kategory),
    //     ]);
    // }

    // public function indexAktivitas($kategory)
    // {
    //     $data = News::where('kategory', $kategory)->paginate(9);
    //     // dd($data);
    //     return view('home.list-news', [
    //         'news' => $data,
    //         'kategory' => $kategory,
    //         'menu' => 'aktivitas'
    //     ]);
    // }

    // public function aktivitasDetail($kategory, $slug)
    // {
    //     $data = News::where('slug', $slug)->firstOrFail();
    //     $data->increment('views');
    //     $allnews = News::whereIn('kategory', ['kegiatan_mahasiswa','ekstrakulikuler','kegiatan_kampus'])->orderBy('date', 'desc')->take(4)->get();

    //     // dd($data);  
    //     return view('home.detail-news', [
    //         'news' => $data,
    //         'allnews' => $allnews,
    //         'kategori' => str()->title($kategory),
    //     ]);
    // }

    public function indexArtikel($kategory)
    {
        $data = News::where('kategory', $kategory)->paginate(9);
        // dd($data);
        return view('home.list-news', [
            'news' => $data,
            'kategory' => $kategory,
            'menu' => 'artikel'
        ]);
    }

    public function artikelDetail($kategory, $slug)
    {
        $data = News::where('slug', $slug)->firstOrFail();
        $data->increment('views');
        $allnews = News::whereIn('kategory', ['jurnal', 'sda'])->orderBy('date', 'desc')->take(4)->get();

        // dd($data);  
        return view('home.detail-news', [
            'news' => $data,
            'allnews' => $allnews,
            'kategori' => str()->title($kategory),
        ]);
    }

    //HALAMAN DASHBOARD

    //dashboard berita
    public function news()
    {
        $artikel = News::whereIn('kategory',['berita','pengumuman','agenda'])->orderBy('date', 'desc')->get();
        return view('admin.artikel', [
            'artikel' => $artikel,
            'title' => "Berita"
        ]);
    }

    public function newsForm($id = null)
    {

        if (isset($id)) {
            $data = News::find($id);
            return view('admin.form-artikel', [
                'data' => $data,
                'title' => 'Update Berita',
            ]);
        } else {
            return view('admin.form-artikel', [
                'title' => 'Tambah Berita'
            ]);
        }
    }
    // end dashboard berita 

    // // dashboard pengumuman 
    // public function pengumuman()
    // {
    //     $artikel = News::whereIn('kategory',['jadwal_ujian','seminar','kuliah_umum'])->orderBy('date', 'desc')->get();
    //     return view('admin.artikel', [
    //         'artikel' => $artikel,
    //         'title' => "Pengumuman"
    //     ]);
    // }

    // public function pengumumanForm($id = null)
    // {

    //     if (isset($id)) {
    //         $data = News::find($id);
    //         return view('admin.form-artikel', [
    //             'data' => $data,
    //             'title' => 'Update Pengumuman',
    //         ]);
    //     } else {
    //         return view('admin.form-artikel', [
    //             'title' => 'Tambah Pengumuman'
    //         ]);
    //     }
    // }
    // // end dashboard pengumuman 

    // // dashboard aktivitas 
    // public function aktivitas()
    // {
    //     $artikel = News::whereIn('kategory',['kegiatan_mahasiswa','ekstrakulikuler','kegiatan_kampus'])->orderBy('date', 'desc')->get();
    //     return view('admin.artikel', [
    //         'artikel' => $artikel,
    //         'title' => "Aktivitas"
    //     ]);
    // }

    // public function aktivitasForm($id = null)
    // {

    //     if (isset($id)) {
    //         $data = News::find($id);
    //         return view('admin.form-artikel', [
    //             'data' => $data,
    //             'title' => 'Update Aktivitas',
    //         ]);
    //     } else {
    //         return view('admin.form-artikel', [
    //             'title' => 'Tambah Aktivitas'
    //         ]);
    //     }
    // }
    // // end dashboard aktivitas 

    // dashboard artikel
    public function artikel()
    {
        $artikel = News::whereIn('kategory',['sda'])->orderBy('date', 'desc')->get();
        return view('admin.artikel', [
            'artikel' => $artikel,
            'title' => "Artikel"
        ]);
    }

    public function artikelForm($id = null)
    {

        if (isset($id)) {
            $data = News::find($id);
            return view('admin.form-artikel', [
                'data' => $data,
                'title' => 'Update Artikel',
            ]);
        } else {
            return view('admin.form-artikel', [
                'title' => 'Tambah Artikel'
            ]);
        }
    }
    // end dashboard artikel

    public function newsStore(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('img-news');
        }

        $content = str_replace('<table>', '<table class="table table-bordered"', $request->content);
        $content = str_replace('<figure class="table">', '<figure class="table-responsive">', $content);
        $content = str_replace('<img', '<img id="gambar-berita"', $request->content);
        $content = str_replace('<figure class="image">', '<figure class="image text-center">', $content);

        News::Create([
            'title' => ucfirst($request->title),
            'slug' => uniqid() . '-' . str()->slug($request->title),
            'kategory' => $request->kategory,
            'date' => $request->date,
            'image' => $image ?? NULL,
            'content' => $content
        ]);

        if (in_array($request->kategory, ['berita','pengumuman','agenda'])) {
            $text = 'news';
        }elseif (in_array($request->kategory, ['jadwal_ujian','seminar','kuliah_umum'])){
            $text = 'pengumuman';
        }elseif (in_array($request->kategory, ['kegiatan_mahasiswa','ekstrakulikuler','kegiatan_kampus'])){
            $text = 'aktivitas';
        }elseif (in_array($request->kategory, ['jurnal','sda'])){
            $text = 'artikel';
        }

        return redirect("dashboard/$text")->with('success', 'Data berhasil ditambahkan.');
    }

    public function newsUpdate(Request $request, $id)
    {
        $data = News::find($id);
        $image = $data->image;

        if ($request->file('image')) {
            if ($data->image != NULL) {
                Storage::delete($data->image);
            }
            $image = $request->file('image')->store('img-news');
        }

        $content = str_replace('<table>', '<table class="table table-bordered"', $request->content);
        $content = str_replace('<figure class="table">', '<figure class="table-responsive">', $content);
        $content = str_replace('<img', '<img id="gambar-berita"', $request->content);
        $content = str_replace('<figure class="image">', '<figure class="image text-center">', $content);

        $data->update([
            'title' => ucfirst($request->title),
            'slug' => uniqid() . '-' . str()->slug($request->title),
            'kategory' => $request->kategory,
            'date' => $request->date,
            'image' => $image,
            'content' => $content
        ]);

        if (in_array($request->kategory, ['berita','pengumuman','agenda'])) {
            $text = 'news';
        }elseif (in_array($request->kategory, ['jadwal_ujian','seminar','kuliah_umum'])){
            $text = 'pengumuman';
        }elseif (in_array($request->kategory, ['kegiatan_mahasiswa','ekstrakulikuler','kegiatan_kampus'])){
            $text = 'aktivitas';
        }elseif (in_array($request->kategory, ['jurnal','sda'])){
            $text = 'artikel';
        }

        return redirect("dashboard/$text")->    with('success', 'Data berhasil diupdate.');
    }

    public function newsDelete($id)
    {
        $news = News::findOrFail($id);

        if ($news->image != null) {
            Storage::delete($news->image);
        }

        $news->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

}
