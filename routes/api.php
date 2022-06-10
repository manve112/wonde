<?php

use Illuminate\Support\Facades\Route;

Route::prefix('employee')->group(function () {
    Route::get('/', \App\Http\Controllers\EmployeeController::class);

    Route::prefix('{employee}')->group(function () {
        Route::get('/classes', [\App\Http\Controllers\EmployeeClassesController::class, 'index']);
    });
});

Route::prefix('class')->group(function () {
    Route::prefix('{class}')->group(function () {
        Route::get('/students', [\App\Http\Controllers\StudentController::class, 'index']);
    });
});
