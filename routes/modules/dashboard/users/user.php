<?php

use App\Http\Controllers\modules\Dashboard\DashboardUserController;
use Illuminate\Support\Facades\Route;

Route::resource('/dashboard/user', DashboardUserController::class)->middleware('auth');
