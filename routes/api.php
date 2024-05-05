<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanningController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register'])->name('user.register');
});

Route::prefix('planning')->group(function () {
    Route::post('/setLocale', [PlanningController::class, 'setLocale'])->name('planning.setLocale');
});