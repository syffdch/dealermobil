<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\RestoreController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TipeController;

Route::get('solomitsubishi', [HomeController::class, 'index'])->name('home');
Route::get('solomitsubishi/artikel', [HomeController::class, 'artikel'])->name('web.artikel');
Route::get('solomitsubishi/galeri', [HomeController::class, 'galeri'])->name('web.galeri');
Route::get('solomitsubishi/mobil', [HomeController::class, 'mobil'])->name('web.mobil');
Route::get('solomitsubishi/kontak', [HomeController::class, 'kontak'])->name('web.kontak');

//auth
Route::get('solomitsubishi/auth', [AuthController::class, 'index'])->name('auth');
Route::post('solomitsubishi/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('solomitsubishi/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'admin'], function () {
    Route::get('solomitsubishi/admin', [AdminController::class, 'index'])->name('admin');

    //user
    Route::get('solomitsubishi/admin/user', [UserController::class, 'index'])->name('user');
    Route::post('solomitsubishi/admin/user/tambah', [UserController::class, 'create'])->name('user.create');
    Route::post('solomitsubishi/admin/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::delete('solomitsubishi/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    //setting
    Route::get('solomitsubishi/admin/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('solomitsubishi/admin/setting/update', [SettingController::class, 'setting'])->name('setting.update');
    Route::post('solomitsubishi/admin/setting/carousel', [SettingController::class, 'carousel'])->name('setting.carousel');
    Route::delete('solomitsubishi/admin/setting/{id}/hapus', [SettingController::class, 'carousel_destroy'])->name('carousel.destroy');

    //tipe mobil
    Route::get('solomitsubishi/admin/tipe', [TipeController::class, 'index'])->name('tipe');
    Route::post('solomitsubishi/admin/tipe/tambah', [TipeController::class, 'create'])->name('tipe.create');
    Route::post('solomitsubishi/admin/tipe/edit', [TipeController::class, 'edit'])->name('tipe.edit');
    Route::delete('solomitsubishi/admin/tipe/{id}', [TipeController::class, 'destroy'])->name('tipe.destroy');
    
    //mobil
    Route::get('solomitsubishi/admin/mobil', [MobilController::class, 'index'])->name('mobil');
    Route::get('solomitsubishi/admin/mobil/tambah', [MobilController::class, 'mobil_create'])->name('mobil.create');
    Route::get('solomitsubishi/admin/mobil/harga', [MobilController::class, 'dt_create'])->name('dtmobil.create');
    Route::post('solomitsubishi/admin/mobil/store', [MobilController::class, 'mobil_store'])->name('mobil.store');
    Route::post('solomitsubishi/admin/mobil/dtstore', [MobilController::class, 'dtmobil_store'])->name('dtmobil.store');
    Route::get('solomitsubishi/admin/mobil/edit', [MobilController::class, 'edit'])->name('mobil.edit');
    Route::post('solomitsubishi/admin/mobil/update', [MobilController::class, 'update'])->name('mobil.update');
    Route::delete('solomitsubishi/admin/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');

    //artikel
    Route::get('solomitsubishi/admin/artikel', [ArtikelController::class, 'index'])->name('artikel');
    Route::get('solomitsubishi/admin/artikel/tambah', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel/upload', [ArtikelController::class, 'uploadTemporaryImage'])->name('artikel.upload');
    Route::post('solomitsubishi/admin/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('solomitsubishi/admin/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::post('solomitsubishi/admin/artikel/update', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('solomitsubishi/admin/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');

    //galeri
    Route::get('solomitsubishi/admin/galeri', [GaleriController::class, 'index'])->name('galeri');
    Route::post('solomitsubishi/admin/galeri/tambah', [GaleriController::class, 'create'])->name('galeri.create');
    Route::post('solomitsubishi/admin/galeri/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::delete('solomitsubishi/admin/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    //restore
    Route::get('solomitsubishi/admin/restore', [RestoreController::class, 'index'])->name('restore');
    Route::post('solomitsubishi/admin/restore/user/{id}', [RestoreController::class, 'user'])->name('restore.user');
    Route::post('solomitsubishi/admin/restore/artikel/{id}', [RestoreController::class, 'artikel'])->name('restore.artikel');
    Route::post('solomitsubishi/admin/restore/galeri/{id}', [RestoreController::class, 'galeri'])->name('restore.galeri');
});

