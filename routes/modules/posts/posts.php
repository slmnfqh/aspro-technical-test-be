<?php

use App\Http\Controllers\modules\Post\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index']);

Route::post('/posts', [PostController::class, 'store']);
