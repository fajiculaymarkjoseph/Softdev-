<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterviewController;



// Interview Scheduling API Routes    

    Route::get('/interviews', [InterviewController::class, 'index']);
    Route::prefix('interview')->group(function () {
    Route::post('/create', [InterviewController::class, 'store']);  // Create Interview
    Route::get('/all', [InterviewController::class, 'index']);     // Get All Interviews
    Route::get('/{id}', [InterviewController::class, 'show']);     // Get Interview by ID
    Route::put('/update/{id}', [InterviewController::class, 'update']); // Update Interview
    Route::delete('/delete/{id}', [InterviewController::class, 'destroy']); // Delete 

});
