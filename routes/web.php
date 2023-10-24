<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/confirmed-otp', [UserController::class, 'showConfirmForm'])->name('confirmed-otp')->middleware('throttle:1,2');
Route::post('/login-confirm', [UserController::class, 'confirmAndLogin'])->name('login-confirm');
