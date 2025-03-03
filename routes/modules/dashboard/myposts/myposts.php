<?php

use App\Http\Controllers\modules\Dashboard\DashboardPostController;
use Illuminate\Support\Facades\Route;

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Route untuk restore post yang dihapus
// Gunakan patch karena kita hanya mengubah status deleted_at tanpa menambah data baru.
Route::patch('/dashboard/posts/{id}/restore', [DashboardPostController::class, 'restore'])
    ->middleware('auth')->name('dashboard.posts.restore');
