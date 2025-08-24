<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminNewsController;

// Frontend Routes
Route::get('/', [NewsController::class, 'landing'])->name('landing'); // Landing page route
Route::get('/home', [NewsController::class, 'index'])->name('home'); // News listing page
Route::get('/divisi', [NewsController::class, 'divisi'])->name('divisi'); // Divisi page route
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/category/{category}', [NewsController::class, 'category'])->name('news.category');
Route::get('/search', [NewsController::class, 'search'])->name('news.search');
Route::post('/admin/upload/image', [NewsController::class, 'uploadImage'])->name('admin.upload.image');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('news', AdminNewsController::class);

    // Upload routes untuk CKEditor content images
    Route::post('news/upload-content-image', [AdminNewsController::class, 'uploadContentImage'])->name('news.upload-content-image');
    Route::delete('news/delete-content-image', [AdminNewsController::class, 'deleteContentImage'])->name('news.delete-content-image');
});