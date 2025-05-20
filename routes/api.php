<?php
use Illuminate\Http\Request;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\InterviewStatusController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\InterviewerController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('applicants')->group(function () {
    Route::get('/', [ApplicantController::class, 'index']);
    Route::post('/', [ApplicantController::class, 'store']);
    Route::get('{id}', [ApplicantController::class, 'show']);
    Route::put('{id}', [ApplicantController::class, 'update']);
    Route::delete('{id}', [ApplicantController::class, 'destroy']);
});


Route::prefix('interviewers')->group(function () {
    Route::get('/', [InterviewerController::class, 'index']); 
    Route::post('/', [InterviewerController::class, 'store']); 
    Route::get('{id}', [InterviewerController::class, 'show']);
    Route::put('{id}', [InterviewerController::class, 'update']); 
    Route::delete('{id}', [InterviewerController::class, 'destroy']); 
});

Route::prefix('schedules')->group(function () {
    Route::get('interview-schedules', [InterviewController::class, 'index']);
    Route::post('interview-schedules', [InterviewController::class, 'store']);
    Route::put('/interview-schedules/{id}', [InterviewController::class, 'update']);
    Route::delete('/interview-schedules/{id}', [InterviewController::class, 'destroy']);
    Route::post('/interview-schedules/assign', [InterviewController::class, 'assign']);
});

Route::get('/scores', [ScoreController::class, 'index']);
Route::post('/scores', [ScoreController::class, 'store']);
Route::get('/scores/{id}', [ScoreController::class, 'show']);
Route::delete('/scores/{id}', [ScoreController::class, 'destroy']);

Route::get('/statuses', [InterviewStatusController::class, 'index']);
Route::get('/statuses/{applicant_id}', [InterviewStatusController::class, 'show']);
