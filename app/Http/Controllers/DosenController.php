<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function indexHome()
    {
        return view('home.civitas', [
            'title' => 'Civitas',
            'dosen' => Dosen::paginate(8),
        ]);
    }
}
