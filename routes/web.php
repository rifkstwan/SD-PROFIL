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

// Temporary routes to migrate and seed the database on Vercel
Route::get('/migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return 'Migration output:<br><pre>' . \Illuminate\Support\Facades\Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return 'Migration failed: ' . $e->getMessage();
    }
});

Route::get('/seed', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        return 'Seeding output:<br><pre>' . \Illuminate\Support\Facades\Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return 'Seeding failed: ' . $e->getMessage();
    }
});

