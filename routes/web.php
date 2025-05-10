<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['web'])->group(function () {
    Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::middleware(['role:superadmin'])->group(function () {
    Route::get('/superadmin', [SuperadminController::class, 'index']);
});
require __DIR__.'/auth.php';
