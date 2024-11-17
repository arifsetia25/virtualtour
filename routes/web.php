<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotspotController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PanoramaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.login');
});
Route::post('/', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('auth.logout');

Route::get('panorama', [\App\Http\Controllers\PanoramaController::class, 'index'])->name('panorama');
Route::get('panorama/show/{id}', [\App\Http\Controllers\PanoramaController::class, 'show'])->name('panorama.show');
Route::post('panorama', [\App\Http\Controllers\PanoramaController::class, 'uploadGambar'])->name('upload.gambar');
Route::post('panorama/show/{id}', [\App\Http\Controllers\PanoramaController::class, 'storeHotspot'])->name('store.hotspot');
//Route::resource('panorama', \App\Http\Controllers\PanoramaController::class);
Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('profil', MainController::class);
