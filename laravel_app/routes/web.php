<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('upload');
});


Route::post('/analyze',[ResumeController::class,'analyze'])->name('resume.analyze');

Route::get('/admin/login',[AdminController::class,'showLogin'])->name('admin.login');
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login.submit');

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
});
