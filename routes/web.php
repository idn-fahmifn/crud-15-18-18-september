<?php

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



