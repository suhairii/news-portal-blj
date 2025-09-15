<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\AuthController;

// Frontend Routes
Route::get('/', [NewsController::class, 'landing'])->name('landing');
Route::get('/home', [NewsController::class, 'index'])->name('home');
Route::get('/divisi', [NewsController::class, 'divisi'])->name('divisi');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/category/{category}', [NewsController::class, 'category'])->name('news.category');
Route::get('/search', [NewsController::class, 'search'])->name('news.search');
Route::post('/admin/upload/image', [NewsController::class, 'uploadImage'])->name('admin.upload.image');

// Authentication Routes
Route::get('/masuk', [AuthController::class, 'showLogin'])->name('login');
Route::post('/masuk', [AuthController::class, 'login'])->name('login.submit');
Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('news', AdminNewsController::class);
        Route::post('news/upload-content-image', [AdminNewsController::class, 'uploadContentImage'])->name('news.upload-content-image');
        Route::delete('news/delete-content-image', [AdminNewsController::class, 'deleteContentImage'])->name('news.delete-content-image');
    });
});

// Atau menggunakan middleware 'auth' bawaan Laravel (yang sudah ada)
Route::middleware('auth')->group(function () {
    // Routes yang memerlukan authentication
});