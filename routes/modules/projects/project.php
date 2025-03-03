<?php

use App\Http\Controllers\modules\Project\ProjectController;
use Illuminate\Support\Facades\Route;


Route::get('/projects',[ProjectController::class, 'index'])->name('projects.index');
