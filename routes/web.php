<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DirekturController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FotoPrestasiController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\SponsorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/seed', function () {
//     return Artisan::call('migrate:fresh --seed');
// });

Route::get('/welcome', function () {
  return view('layouts.home');
});

Route::get('/', [IndexController::class, 'index']);

Route::get('/gallery', [GalleryController::class, 'index']);

Route::get('/dashboard', [IndexController::class, 'dashboard'])->middleware('auth');


// Auth Controller
Route::get('admin', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

// dashboard alumni
Route::get('/dashboard/alumni', [AlumniController::class, 'alumniAdmin']);

Route::get('/dashboard/alumni/{id}', [AlumniController::class, 'detailalumni']);
Route::delete('/dashboard/alumni/{id}', [AlumniController::class, 'destroy']);

// dashbard Sliders
Route::get('/dashboard/sliders', [SlidersController::class, 'sliders'])->middleware('auth')->can('admin');
Route::post('/dashboard/sliders/store', [SlidersController::class, 'slidersStore']);
Route::put('/dashboard/sliders/update/{id}', [SlidersController::class, 'slidersUpdate']);
Route::delete('/dashboard/sliders/delete/{id}', [SlidersController::class, 'slidersDelete']);

// Menu Survei
Route::get('/survei/{menu:slug}', [MenuController::class, 'menuSurvei'])->name('menuSurvei');

// dashboard profil
Route::get('/dashboard/profil', [MenuController::class, 'menu'])->middleware('auth')->can('admin');
Route::get('/dashboard/profil/{menu:slug}', [MenuController::class, 'menuEdit'])->middleware('auth')->can('admin');
Route::put('/dashboard/profil/{menu}', [MenuController::class, 'menuProcessUpdate']);
Route::post('/dashboard/profil/store', [MenuController::class, 'menuStore']);
Route::put('/dashboard/profil/update/{id}', [MenuController::class, 'menuUpdate']);
Route::delete('/dashboard/profil/delete/{id}', [MenuController::class, 'menuDelete']);

// dashboard survei
Route::get('/dashboard/survei', [MenuController::class, 'menu'])->middleware('auth')->can('admin');
Route::get('/dashboard/survei/{menu:slug}', [MenuController::class, 'menuEdit'])->middleware('auth')->can('admin');
Route::put('/dashboard/survei/{menu}', [MenuController::class, 'menuProcessUpdate']);
Route::post('/dashboard/survei/store', [MenuController::class, 'menuStore']);
Route::delete('/dashboard/survei/delete/{id}', [MenuController::class, 'menuDelete']);

// dashboard prestasi
Route::get('/dashboard/prestasi', [PrestasiController::class, 'indexAdmin'])->middleware('auth');
Route::get('/dashboard/prestasi/form/{id?}', [PrestasiController::class, 'prestasiForm'])->middleware('auth')->can('admin');
Route::post('/dashboard/prestasi/form/store', [PrestasiController::class, 'prestasiStore']);
Route::put('/dashboard/prestasi/form/update/{id}', [PrestasiController::class, 'prestasiUpdate']);
Route::delete('/dashboard/prestasi/form/delete/{prestasi}', [PrestasiController::class, 'prestasiDestroy']);

// dashboard prestasi | Foto
Route::get('/dashboard/prestasi/foto/{id}', [FotoPrestasiController::class, 'index'])->middleware('auth')->can('admin');
Route::post('/dashboard/prestasi/foto/store', [FotoPrestasiController::class, 'store']);
Route::delete('/dashboard/prestasi/foto/destroy/{foto}', [FotoPrestasiController::class, 'destroy']);


// dashboard akademik
Route::get('/dashboard/akademik', [MenuController::class, 'menu'])->middleware('auth')->can('admin');
Route::get('/dashboard/akademik/{menu:slug}', [MenuController::class, 'menuEdit'])->middleware('auth')->can('admin');
Route::put('/dashboard/akademik/{menu}', [MenuController::class, 'menuProcessUpdate']);
Route::post('/dashboard/akademik/store', [MenuController::class, 'menuStore']);
Route::put('/dashboard/akademik/update/{id}', [MenuController::class, 'menuUpdate']);
Route::delete('/dashboard/akademik/delete/{id}', [MenuController::class, 'menuDelete']);

//dashboard  news
Route::get('/dashboard/news', [NewsController::class, 'news'])->middleware('auth');
Route::get('/dashboard/news/form/{id?}', [NewsController::class, 'newsForm'])->middleware('auth');

//news|pengumuman|aktivitas|arikel pake method ini
Route::post('/dashboard/news/form/store', [NewsController::class, 'newsStore']);
Route::put('/dashboard/news/form/update/{id}', [NewsController::class, 'newsUpdate']);
Route::delete('/dashboard/news/form/delete/{id}', [NewsController::class, 'newsDelete']);

//dashboard penelitian
Route::get('/dashboard/penelitian', [PenelitianController::class, 'indexAdmin'])->middleware('auth');
Route::get('/dashboard/penelitian/create', [PenelitianController::class, 'create'])->middleware('auth');
Route::post('/dashboard/penelitian/store', [PenelitianController::class, 'store'])->middleware('auth');
Route::get('/dashboard/penelitian/{penelitian}', [PenelitianController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/penelitian/update/{penelitian}', [PenelitianController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/penelitian/destroy/{penelitian}', [PenelitianController::class, 'destroy'])->middleware('auth');

//dashboard  pengumuman
Route::get('/dashboard/pengumuman', [NewsController::class, 'pengumuman'])->middleware('auth');
Route::get('/dashboard/pengumuman/form/{id?}', [NewsController::class, 'pengumumanForm'])->middleware('auth');

//dashboard  aktivitas
Route::get('/dashboard/aktivitas', [NewsController::class, 'aktivitas'])->middleware('auth');
Route::get('/dashboard/aktivitas/form/{id?}', [NewsController::class, 'aktivitasForm'])->middleware('auth');

//dashboard  artikel
Route::get('/dashboard/artikel', [NewsController::class, 'artikel'])->middleware('auth');
Route::get('/dashboard/artikel/form/{id?}', [NewsController::class, 'artikelForm'])->middleware('auth');

//dashboard direktur
Route::get('/dashboard/direktur', [DirekturController::class, 'direktur'])->middleware('auth')->can('admin');
Route::put('/dashboard/direktur/update/{id}', [DirekturController::class, 'direkturUpdate']);

//dashboard visimisi
Route::get('/dashboard/visi-misi', [VisimisiController::class, 'visimisi'])->middleware('auth')->can('admin');
Route::put('/dashboard/visi-misi/update/{id}', [VisimisiController::class, 'visimisiUpdate']);

//dashboard links
Route::get('/dashboard/links', [LinkController::class, 'link'])->can('admin');
Route::put('/dashboard/links/update/{id}', [LinkController::class, 'linkUpdate']);

// dashbard gallery
Route::get('/dashboard/gallery', [GalleryController::class, 'gallery'])->middleware('auth')->can('admin');
Route::post('/dashboard/gallery/store', [GalleryController::class, 'galleryStore']);
Route::put('/dashboard/gallery/update/{id}', [GalleryController::class, 'galleryUpdate']);
Route::delete('/dashboard/gallery/delete/{id}', [GalleryController::class, 'galleryDelete']);

// route sponsor
Route::get('/dashboard/sponsor', [SponsorController::class, 'index'])->middleware('auth')->can('admin');
Route::post('/dashboard/sponsor/store', [SponsorController::class, 'store'])->middleware('auth');
Route::put('/dashboard/sponsor/update/{id}', [SponsorController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/sponsor/delete/{id}', [SponsorController::class, 'delete'])->middleware('auth');

// route fasilitas admin dashboard
Route::get('/dashboard/fasilitas', [FasilitasController::class, 'index'])->middleware('auth')->can('admin');
Route::get('/dashboard/fasilitas/create', [FasilitasController::class, 'create'])->middleware('auth')->can('admin');
Route::get('/dashboard/fasilitas/edit/{id}', [FasilitasController::class, 'edit'])->middleware('auth')->can('admin');
Route::put('/dashboard/fasilitas/update/{id}', [FasilitasController::class, 'update'])->middleware('auth')->can('admin');
Route::post('/dashboard/fasilitas/store', [FasilitasController::class, 'store'])->middleware('auth')->can('admin');
Route::delete('/dashboard/fasilitas/delete/{id}', [FasilitasController::class, 'destroy'])->middleware('auth')->can('admin');
Route::get('/dashboard/fasilitas/foto/delete/{id}/{fasilitas_id}', [FasilitasController::class, 'destroyFoto'])->middleware('auth')->can('admin');
Route::post('/dashboard/fasilitas/foto/store', [FasilitasController::class, 'storeFoto'])->middleware('auth')->can('admin');

// route civitas
Route::get('/dashboard/civitas', [DosenController::class, 'index'])->middleware('auth')->can('admin');
Route::get('/dashboard/civitas/create', [DosenController::class, 'create'])->middleware('auth')->can('admin');
Route::post('/dashboard/civitas/store', [DosenController::class, 'store'])->middleware('auth');
Route::get('/dashboard/civitas/{id}', [DosenController::class, 'edit'])->middleware('auth')->can('admin');
Route::put('/dashboard/civitas/update/{id}', [DosenController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/civitas/destroy/{id}', [DosenController::class, 'destroy'])->middleware('auth');

// INI HARUS BAGIAN BAWAH BIAR TIDAK MENIMPA
// news
Route::get('/berita/{kategory}', [NewsController::class, 'index'])->name('list-news');
Route::get('/berita/{kategory}/{slug}', [NewsController::class, 'newsDetail']);

//pengumuman
Route::get('/pengumuman/{kategory}', [NewsController::class, 'indexPengumuman'])->name('list-announcement');
Route::get('/pengumuman/{kategory}/{slug}', [NewsController::class, 'pengumumanDetail']);

//aktivitas
Route::get('/aktivitas/{kategory}', [NewsController::class, 'indexAktivitas'])->name('list-activity');
Route::get('/aktivitas/{kategory}/{slug}', [NewsController::class, 'aktivitasDetail']);

//sarana umum
Route::get('/sarana_umum/{id}', [FasilitasController::class, 'detailFasilitas']);

//artikel
Route::get('/artikel/{kategory}', [NewsController::class, 'indexArtikel'])->name('list-artikel');
Route::get('/artikel/{kategory}/{slug}', [NewsController::class, 'artikelDetail']);

// prestasi
Route::get('/prestasi/{prestasi:slug}', [PrestasiController::class, 'prestasiDetail']);

// profil & dokumen
Route::get('/{menu}/{slug}', [MenuController::class, 'index']);

Route::get('/spada', function () {
  return view('home.spada');
});

// ini menu prestasi
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');

// menu civitas
Route::get('/civitas', [DosenController::class, 'indexHome']);

// menu penelitian
Route::get('/penelitian', [PenelitianController::class, 'indexHome']);

// menu biodata alumni
Route::get('/biodata-alumni', [AlumniController::class, 'alumniHome']);
Route::post('/biodata-alumni', [AlumniController::class, 'alumniStore']);
