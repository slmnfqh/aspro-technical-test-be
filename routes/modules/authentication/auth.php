<?php

use App\Http\Controllers\modules\Authentication\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticationController::class, 'indexLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');


Route::get('/register', [AuthenticationController::class, 'indexRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthenticationController::class, 'store'])->name('store');