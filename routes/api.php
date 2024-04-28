<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register'])->name('user.register');
});