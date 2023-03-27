<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index($kategory)
    {
        $data = News::where('kategory', $kategory)->paginate(9);
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
        $allnews = News::where('kategory', $kategory)->orderBy('date', 'desc')->take(4)->get();

        // dd($data);  
        return view('home.detail-news', [
            'news' => $data,
            'allnews' => $allnews,
            'kategori' => str()->title($kategory),
        ]);
    }

    public function pengumuman($kategory)
    {
        $data = News::where('kategory', $kategory)->paginate(9);
        // dd($data);
        return view('home.list-news', [
            'news' => $data,
            'kategory' => $kategory,
            'menu' => 'pengumuman'
        ]);
    }


    public function news()
    {
        // if (request()->is('dashboard/news/informasi*')) {
        //     $slug = 'informasi';
        // }
        // if (request()->is('dashboard/news/pengumuman*')) {
        //     $slug = 'pengumuman';
        // }
        // if (request()->is('dashboard/news/event*')) {
        //     $slug = 'event';
        // }
        // if (request()->is('dashboard/news/greenmetric*')) {
        //     $slug = 'greenmetric';
        // }

        $artikel = News::all();
        return view('admin.artikel', [
            'artikel' => $artikel,
            // 'slug' => $slug
            'title' => "Berita"
        ]);
    }

    public function newsForm($id = null)
    {
        // if (request()->is('dashboard/news/informasi*')) {
        //     $slug = 'informasi';
        // }
        // if (request()->is('dashboard/news/pengumuman*')) {
        //     $slug = 'pengumuman';
        // }
        // if (request()->is('dashboard/news/event*')) {
        //     $slug = 'event';
        // }
        // if (request()->is('dashboard/news/greenmetric*')) {
        //     $slug = 'greenmetric';
        // }

        if (isset($id)) {
            $data = News::find($id);
            return view('admin.form-artikel', [
                'data' => $data,
                'title' => 'Tambah Berita',
            ]);
        } else {
            return view('admin.form-artikel', [
                'title' => 'Tambah Berita'
            ]);
        }
    }

    public function newsStore(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('img-news');
        }

        News::Create([
            'title' => ucfirst($request->title),
            'slug' => uniqid() . '-' . str()->slug($request->title),
            'kategory' => $request->kategory,
            'date' => $request->date,
            'image' => $image ?? NULL,
            'content' => $request->content
        ]);
        return redirect("dashboard/news")->with('success', 'Data berhasil ditambahkan.');
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

        $data->update([
            'title' => ucfirst($request->title),
            'slug' => uniqid() . '-' . str()->slug($request->title),
            'kategory' => $request->kategory,
            'date' => $request->date,
            'image' => $image,
            'content' => $request->content
        ]);
        return redirect("dashboard/news")->with('success', 'Data berhasil diupdate.');
    }

    public function newsDelete($id)
    {
        $news = News::findOrFail($id);

        if ($news->image != null) {
            Storage::delete($news->image);
        }

        $news->delete();
        return redirect('dashboard/news')->with('success', 'Data berhasil dihapus.');
    }
}
