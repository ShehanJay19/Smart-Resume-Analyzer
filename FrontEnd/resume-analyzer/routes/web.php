<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::get('/', function () {
    return view('upload');
});

Route::post('/analyze', [ResumeController::class, 'analyze']);
