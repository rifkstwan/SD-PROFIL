<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('berita', NewsController::class);
    Route::resource('galeri', GalleryController::class);
    Route::resource('prestasi', \App\Http\Controllers\Admin\AchievementController::class);
    Route::delete('galeri-image/{image}', [GalleryController::class, 'destroyImage'])->name('galeri-image.destroy');
    Route::get('profil-sekolah', [SchoolProfileController::class, 'edit'])->name('profil-sekolah.edit');
    Route::put('profil-sekolah', [SchoolProfileController::class, 'update'])->name('profil-sekolah.update');

    Route::resource('inquiries', \App\Http\Controllers\Admin\InquiryController::class)->only(['index', 'show', 'destroy']);

    Route::middleware(['superadmin'])->group(function () {
        Route::resource('users', UserController::class);
        Route::get('pengaturan', [SettingController::class, 'index'])->name('pengaturan.index');
        Route::post('pengaturan', [SettingController::class, 'update'])->name('pengaturan.update');
    });

    Route::post('notifications/{id}/read', [\App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('notifications/read-all', [\App\Http\Controllers\Admin\NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
});
