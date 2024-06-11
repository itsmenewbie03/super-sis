<?php

use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('subjects')->group(function () {
        Route::get('/', [SubjectController::class, 'index'])->name('subjects.index');
        Route::post('/add', [SubjectController::class, 'add'])->name('subjects.post');
        Route::put('/edit/{id}', [SubjectController::class, 'edit'])->name('subjects.update');
        Route::delete('/delete/{id}', [SubjectController::class, 'delete'])->name('subjects.delete');
        Route::get('/search', [SubjectController::class, 'search'])->name('subjects.search');
    });
});
