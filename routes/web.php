<?php

use App\Models\Berita;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $berita = Berita::all();
    return view('welcome', compact ('berita'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route penulis
Route::resource('penulis', App\Http\Controllers\PenulisController::class)->middleware('auth');
Route::post('penulis/export-penulis', [App\Http\Controllers\PenulisController::class, 'viewPDF'])->name('penulis.view-pdf');

//route kategori
Route::resource('kategori', App\Http\Controllers\KategoriController::class)->middleware('auth');
Route::post('kategori/export-kategori', [App\Http\Controllers\KategoriController::class, 'viewPDF'])->name('kategori.view-pdf');

//route berita
Route::resource('berita', App\Http\Controllers\BeritaController::class)->middleware('auth');
Route::post('berita/export-berita', [App\Http\Controllers\BeritaController::class, 'viewPDF'])->name('berita.view-pdf');
