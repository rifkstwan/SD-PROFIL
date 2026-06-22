<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Public\GalleryController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', fn() => view('public.profil.index'))->name('profil.index');
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.show');
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
Route::get('/prestasi', [\App\Http\Controllers\Public\PrestasiController::class, 'index'])->name('prestasi.index');
Route::post('/inquiry', [\App\Http\Controllers\Public\InquiryController::class, 'store'])->name('inquiry.store');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
