<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;

// Public
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth
Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin (protected)
Route::middleware('admin')->group(function () {
    Route::get('/kegiatan/export/pdf', [KegiatanController::class, 'exportPdf'])->name('kegiatan.pdf');
    Route::resource('kegiatan', KegiatanController::class)->except(['show']);
});
