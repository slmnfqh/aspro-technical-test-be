<?php

use App\Http\Controllers\modules\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
