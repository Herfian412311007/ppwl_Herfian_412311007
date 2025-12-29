<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama untuk user (guest)
Route::get('/', function () {
    return view('user.home'); // view untuk user home
})->name('home');

// Dashboard umum (user biasa)
Route::get('/dashboard', function () {
    return view('dashboard'); // view dashboard user
})->middleware(['auth', 'verified'])->name('dashboard');

// Dashboard admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // view dashboard admin
})->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');

// Group route untuk profile (hanya user yang login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, dll)
require __DIR__.'/auth.php';