<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
  public function indexHome()
  {
    $data = Penelitian::all();
    return view('home.penelitian', [
      'title' => 'Penelitian',
      'data' => $data,
    ]);
  }
}
