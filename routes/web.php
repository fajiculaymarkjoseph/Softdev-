<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterviewController;

Route::get('/', function () {
    return "Laravel is running!";
});

Route::get('/schedule', function () {
    return view('schedule');
});

Route::get('/interviews', [InterviewController::class, 'index']);
