<?php

use App\Http\Middleware\IsOwner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// Halaman Utama (Daftar Berita)
Route::get('/', [NewsController::class, 'index'])->name('news.index');


Route::middleware(['auth', IsOwner::class])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
});

// Rute untuk menambahkan komentar (auth required)
Route::middleware(['auth'])->group(function () {
    Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


// Rute Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'You have successfully logged out.');
})->name('logout');

// Rute Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Rute Autentikasi
require __DIR__.'/auth.php';
