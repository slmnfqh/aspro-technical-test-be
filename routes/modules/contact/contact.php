<?php

use App\Http\Controllers\modules\Contact\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
