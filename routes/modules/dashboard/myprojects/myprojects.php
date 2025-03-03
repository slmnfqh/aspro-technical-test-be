<?php

use App\Http\Controllers\modules\Dashboard\DashboardProjectController;
use Illuminate\Support\Facades\Route;

Route::resource('/dashboard/projects', DashboardProjectController::class)->middleware('auth');

// Route untuk restore post yang dihapus
// Gunakan patch karena kita hanya mengubah status deleted_at tanpa menambah data baru.
Route::patch('/dashboard/projects/{id}/restore', [DashboardProjectController::class, 'restore'])
    ->middleware('auth')->name('dashboard.projects.restore');
