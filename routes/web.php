<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Kategori route
Route::get('kategori', [KategoriController::class, 'index'])->name('kategori-index');
Route::post('kategori/post', [KategoriController::class, 'store'])->name('kategori-post');
Route::get('kategori/{param}', [KategoriController::class, 'detail'])->name('kategori-detail');
Route::put('kategori/{param}', [KategoriController::class, 'update'])->name('kategori-update');
Route::delete('kategori/{param}', [KategoriController::class, 'destroy'])->name('kategori-delete');

// barang route
Route::get('barang', [BarangController::class, 'index'])->name('barang-index');
Route::post('barang/post', [BarangController::class, 'store'])->name('barang-post');
Route::get('barang/{param}', [BarangController::class, 'detail'])->name('barang-detail');
Route::put('barang/{param}', [BarangController::class, 'update'])->name('barang-update');
Route::delete('barang/{param}', [BarangController::class, 'destroy'])->name('barang-delete');



