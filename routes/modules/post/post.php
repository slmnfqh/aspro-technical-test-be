<?php

use App\Http\Controllers\modules\Post\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('posts.show');

