<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index($menu, $slug)
    {
        if ($menu == 'profil') $data = Menu::where('slug', $slug)->get()->first();
        if ($menu == 'dokumen') $data = Menu::where('slug', $slug)->get()->first();
        if ($menu == 'akademik') $data = Menu::where('slug', $slug)->get()->first();

        return view('home.page', [
            'menu' => $data,
        ]);
    }

    public function menu()
    {
        if (request()->is('dashboard/profil*')) {
            $data = Menu::where('kategory', 'profil')->get();
            $slug = 'profil';
        }
        if (request()->is('dashboard/dokumen*')) {
            $data = Menu::where('kategory', 'dokumen')->get();
            $slug = 'dokumen';
        }
        if (request()->is('dashboard/akademik*')) {
            $data = Menu::where('kategory', 'akademik')->get();
            $slug = 'akademik';
        }
        if (request()->is('dashboard/survei*')) {
            $data = Menu::where('kategory', 'survei')->get();
            $slug = 'survei';
        }

        return view('admin.menu', [
            "data" => $data,
            "slug" => $slug,
            "title" => str()->title($slug)
        ]);
    }

    public function menuStore(Request $request)
    {
        if (request()->is('dashboard/profil*')) {
            $slug = 'profil';
        }
        if (request()->is('dashboard/dokumen*')) {
            $slug = 'dokumen';
        }
        if (request()->is('dashboard/akademik*')) {
            $slug = 'akademik';
        }
        Menu::Create([
            'title' => ucfirst($request->title),
            'slug' => str()->slug($request->title),
            'kategory' => $slug
        ]);
        return redirect("dashboard/$slug")->with('sukses', 'Data berhasil ditambahkan');
    }

    public function menuEdit(Menu $menu)
    {
        if (request()->is('dashboard/profil*')) {
            $slug = 'profil';
        }
        if (request()->is('dashboard/dokumen*')) {
            $slug = 'dokumen';
        }
        if (request()->is('dashboard/akademik*')) {
            $slug = 'akademik';
        }
        if (request()->is('dashboard/survei*')) {
            $slug = 'survei';
        }

        return view('admin.menu-edit', [
            'menu' => $menu,
            'slug' => $slug,
            'title' => 'Edit | ' . str()->title($slug)
        ]);
    }

    public function menuProcessUpdate(Request $request, Menu $menu)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'image' => 'required',
        //     'content' => 'required',
        // ]);
        // dd($menu);

        if (request()->is('dashboard/profil*')) {
            $slug = 'profil';
        }
        if (request()->is('dashboard/dokumen*')) {
            $slug = 'dokumen';
        }
        if (request()->is('dashboard/akademik*')) {
            $slug = 'akademik';
        }
        if (request()->is('dashboard/survei*')) {
            $slug = 'survei';
        }

        if ($menu->image != null) {
            Storage::delete($menu->image);
        }
        if ($request->has('image')) {
            $image = $request->file('image')->store("menu-$slug");
        }

        $content = str_replace('<table>', '<table class="table table-bordered"', $request->content);
        $content = str_replace('<figure class="table">', '<figure class="table-responsive">', $content);
        
        $menu->update([
            'title' => ucfirst($request->title),
            'image' => $image ?? null,
            'content' => $content,
        ]);

        return redirect("dashboard/$slug")->with('success', 'Data menu berhasil diupdate.');
    }

    public function menuDelete($id)
    {
        if (request()->is('dashboard/profil*')) {
            $slug = 'profil';
        }
        if (request()->is('dashboard/dokumen*')) {
            $slug = 'dokumen';
        }
        if (request()->is('dashboard/akademik*')) {
            $slug = 'akademik';
        }

        $data = Menu::find($id);

        if ($data->image != null) {
            Storage::delete($data->image);
        }

        $data->delete();
        return redirect('dashboard/' . $slug)->with('sukses', 'Data berhasil dihapus');
    }

    // Menu Survei
    public function menuSurvei(Menu $menu)
    {
        return view('home.page', [
            'menu' => $menu
        ]);
    }
}
