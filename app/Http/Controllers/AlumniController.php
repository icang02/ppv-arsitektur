<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlumniController extends Controller
{
    public function alumniHome()
    {
        return view('home.alumni');
    }

    public function alumniStore(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'hp' => 'required',
            'tanggal_masuk' => 'required',
            'bulan_tahun_lulus' => 'required',
            'status_kerja' => 'required',
            'is_pns' => 'required',
            'kesesuaian_pekerjaan' => 'required',
            'lama_menganggur' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Alumni::create($validatedData);

        return back()->with('success', 'Terimas kasih, data Anda telah direkam.');
    }

    public function alumniAdmin()
    {
        return view('admin.index-alumni', [
            'title' => 'Alumni',
            'alumni' => Alumni::all(),
        ]);
    }

    public function detailalumni($id)
    {
        $data = Alumni::find($id);
        return view('admin.detail-admin', [

            'title' => 'Alumni',
            'data' => $data,
        ]);
    }

    public function destroy($id)
    {
        $alumni = Alumni::find($id);
        $nama = $alumni->nama;
        $alumni->delete();

        return back()->with('success', "Data alumni (<i>$nama</i>) berhasil dihapus");
    }
}
