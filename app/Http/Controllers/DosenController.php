<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function indexHome()
    {
        return view('home.civitas', [
            'title' => 'Civitas',
            'dosen' => Dosen::paginate(8),
        ]);
    }

    public function index()
    {
        $data = Dosen::all();
        return view('admin.civitas.civitas', [
            'title' => 'Civitas',
            'dosen' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.civitas.create', [
            'title' => 'Civitas'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
            'email' => 'required|email:dns',
            'jabatan' => 'required',
            'pendidikan' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg,avif|max:2048',
        ]);

        $foto = $request->file('foto')->store('foto-dosen');
        Dosen::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'nidn' => $request->nidn,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'pendidikan' => $request->pendidikan,
            'foto' => $foto,
        ]);
        return redirect('dashboard/civitas')->with('success', 'Data baru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Dosen::findOrFail($id);
        return view('admin.civitas.edit', [
            'title' => 'Civitas',
            'dosen' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
            'email' => 'required|email:dns',
            'jabatan' => 'required',
            'pendidikan' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg,avif|max:2048',
        ]);

        $dosen = Dosen::findOrFail($id);
        $foto = $dosen->foto;
        if ($request->has('foto')) {
            Storage::delete($foto);
            $foto = $request->file('foto')->store('foto-dosen');
        }

        $dosen->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'nidn' => $request->nidn,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'pendidikan' => $request->pendidikan,
            'foto' => $foto,
        ]);
        return redirect('dashboard/civitas')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        Storage::delete($dosen->foto);
        $dosen->delete();
        return redirect('dashboard/civitas')->with('success', 'Data berhasil diupdate.');
    }
}
