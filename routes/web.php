<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminPartnershipController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Public Frontend Routes
Route::get('/', [NewsController::class, 'landing'])->name('landing');
Route::get('/berita', [NewsController::class, 'index'])->name('berita'); // Diganti dari 'home' ke 'berita'
Route::get('/divisi', [NewsController::class, 'divisi'])->name('divisi');
Route::get('/berita/{news}', [NewsController::class, 'show'])->name('news.show'); // Diganti prefix dari '/news' ke '/berita'
Route::get('/kategori/{category}', [NewsController::class, 'category'])->name('news.category'); // Diganti dari '/category' ke '/kategori'
Route::get('/cari', [NewsController::class, 'search'])->name('news.search'); // Diganti dari '/search' ke '/cari'

// DEBUG ROUTE (HAPUS DI PRODUCTION!)
Route::get('/debug-auth', function () {
    $info = [
        'laravel_version' => app()->version(),
        'auth_check' => Auth::check(),
        'user' => Auth::user(),
        'session_id' => session()->getId(),
        'session_data' => session()->all(),
        'request_path' => request()->path(),
        'request_url' => request()->url(),
        'middleware_stack' => request()->route() ? request()->route()->middleware() : 'no route'
    ];

    return response()->json($info, 200, [], JSON_PRETTY_PRINT);
});

// AUTH ROUTES - PERBAIKAN KEAMANAN
Route::middleware('guest')->group(function () {
    // LOGIN PAGE - hanya bisa diakses jika belum login
    Route::get('/masuk', [AuthController::class, 'showLogin'])->name('login');

    // REGISTER PAGE - tambahkan ini
    Route::get('/daftar', [AuthController::class, 'showRegister'])->name('register.form');

    // LOGIN SUBMIT
    Route::post('/masuk', [AuthController::class, 'login'])->name('login.submit');

    // REGISTER SUBMIT
    Route::post('/daftar', [AuthController::class, 'register'])->name('register');
});

// LOGOUT - hanya bisa diakses jika sudah login
Route::middleware('auth')->group(function () {
    Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');
});

// ADMIN ROUTES - GUNAKAN AdminMiddleware yang sudah dibuat
Route::middleware(['auth', App\Http\Middleware\AdminMiddleware::class])->group(function () {

    // Route dashboard dengan nama 'dashboard' untuk sidebar
    Route::get('/dashboard', function () {
        \Log::info('=== DASHBOARD ACCESSED ===');
        \Log::info('Admin user: ' . Auth::user()->email);
        return view('admin.dashboard');
    })->name('dashboard');

    // Route admin dashboard (bisa tetap ada untuk konsistensi)
    Route::get('/admin/dashboard', function () {
        \Log::info('=== ADMIN DASHBOARD ACCESSED ===');
        \Log::info('Admin user: ' . Auth::user()->email);
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin CRUD routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // News CRUD routes
        Route::resource('news', AdminNewsController::class);

        // Additional news routes for soft delete management
        Route::post('/news/{id}/restore', [AdminNewsController::class, 'restore'])->name('news.restore');
        Route::delete('/news/{id}/force-delete', [AdminNewsController::class, 'forceDelete'])->name('news.force-delete');

        // Bulk actions route - News
        Route::post('/news/bulk-action', [AdminNewsController::class, 'bulkAction'])->name('news.bulk-action');

        // Image upload routes for Quill.js
        Route::post('/news/upload-content-image', [AdminNewsController::class, 'uploadContentImage'])->name('news.upload-content-image');
        Route::delete('/news/delete-content-image', [AdminNewsController::class, 'deleteContentImage'])->name('news.delete-content-image');

        // Partnership CRUD routes
        Route::resource('partnerships', AdminPartnershipController::class);

        // Additional partnership routes for soft delete management
        Route::post('/partnerships/{id}/restore', [AdminPartnershipController::class, 'restore'])->name('partnerships.restore');
        Route::delete('/partnerships/{id}/force-delete', [AdminPartnershipController::class, 'forceDelete'])->name('partnerships.force-delete');

        // Bulk actions route - Partnerships
        Route::post('/partnerships/bulk-action', [AdminPartnershipController::class, 'bulkAction'])->name('partnerships.bulk-action');
        // Partnership image upload route
        Route::post('/partnerships/upload-image', [AdminPartnershipController::class, 'uploadImage'])->name('partnerships.upload-image');
        // General upload route (tetap gunakan NewsController yang asli)
        Route::post('/upload/image', [NewsController::class, 'uploadImage'])->name('upload.image');
    });
});