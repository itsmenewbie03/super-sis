<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('students')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('students.index');
        Route::post('/', [StudentController::class, 'post'])->name('students.post');
        Route::put('/{id}', [StudentController::class, 'update'])->name('students.update');

    });
});
