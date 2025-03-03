<?php

use App\Http\Controllers\modules\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/project/{project:slug}', [ProjectController::class, 'show'])->name('project.show');
