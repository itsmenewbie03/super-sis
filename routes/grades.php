<?php

use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;

// NOTE: this is mine
Route::middleware('auth')->group(function () {
    Route::resource('/grades', GradeController::class);
});
