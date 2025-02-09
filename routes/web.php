<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotspotController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PanoramaController;
use Illuminate\Support\Facades\Route;

route::get("virtualtour", [\App\Http\Controllers\PanoramaController::class, 'virtualtour'])->name('virtualtour');
Route::get("home", [\App\Http\Controllers\HomeController::class, 'home']);
Route::get("sejarah", [\App\Http\Controllers\SejarahController::class, 'sejarah'])->name('sejarah');
Route::get("informasi", [\App\Http\Controllers\InformasiController::class, 'main'])->name('informasi');

Route::get('/', function () {
    return view('admin.login');
});
Route::post('/', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('auth.logout');

Route::get('panorama', [\App\Http\Controllers\PanoramaController::class, 'index'])->name('panorama');
Route::get('panorama/show/{id}', [\App\Http\Controllers\PanoramaController::class, 'show'])->name('panorama.show');
Route::post('panorama', [\App\Http\Controllers\PanoramaController::class, 'uploadGambar'])->name('upload.gambar');
Route::post('panorama/show/{id}', [\App\Http\Controllers\PanoramaController::class, 'storeHotspot'])->name('store.hotspot');
Route::delete('panorama/{id}', [PanoramaController::class, 'destroy'])->name('panorama.destroy');
Route::get('audio', [\App\Http\Controllers\AudioController::class, 'index'])->name('audio');
Route::post('audio', [\App\Http\Controllers\AudioController::class, 'uploadAudio'])->name('upload.audio');
Route::get('audio/{id}', [\App\Http\Controllers\AudioController::class, 'edit'])->name('audio.edit');
Route::put('audio/{id}', [\App\Http\Controllers\AudioController::class, 'update'])->name('audio.update');
Route::delete('audio/{id}', [AudioController::class, 'destroy'])->name('audio.destroy');

Route::get('admin/informasi', [\App\Http\Controllers\InformasiController::class, 'index'])->name('admin/informasi');
Route::post('admin/informasi', [\App\Http\Controllers\InformasiController::class, 'create'])->name('create');
Route::get('admin/informasi/{id}', [\App\Http\Controllers\InformasiController::class, 'edit'])->name('edit.informasi');
Route::put('admin/informasi/{id}', [\App\Http\Controllers\InformasiController::class, 'update'])->name('admin.informasi.update');
Route::delete('admin/informasi/{id}', [\App\Http\Controllers\InformasiController::class, 'destroy'])->name('informasi.destroy');

Route::get('admin/galeri', [\App\Http\Controllers\GaleriController::class, 'index'])->name('admin/galeri');
Route::post('admin/galeri', [\App\Http\Controllers\GaleriController::class, 'create'])->name('create.galeri');
Route::get('admin/galeri/{id}', [\App\Http\Controllers\GaleriController::class, 'edit'])->name('galeri.edit');
Route::put('admin/galeri/{id}', [\App\Http\Controllers\GaleriController::class, 'update'])->name('admin.galeri.update');
Route::delete('admin/galeri/{id}', [\App\Http\Controllers\GaleriController::class, 'destroy'])->name('galeri.destroy');
//Route::resource('panorama', \App\Http\Controllers\PanoramaController::class);
Route::resource('hotspot', HotspotController::class)->middleware('auth');
Route::delete('hotspot/{id}', [HotspotController::class, 'destroy'])->name('hotspot.destroy');
Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('profil', MainController::class);
