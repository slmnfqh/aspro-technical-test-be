<?php

use App\Http\Controllers\modules\About\AboutController;
use Illuminate\Support\Facades\Route;

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
