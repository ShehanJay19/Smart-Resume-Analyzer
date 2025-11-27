<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('upload');
});


Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware(['adminAuth'])->group(function () {

    // Admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // Admin logout
    Route::post('/admin/logout', [AdminController::class, 'logout'])
        ->name('admin.logout');
});

Route::post('/analyze', [ResumeController::class, 'analyze']);
