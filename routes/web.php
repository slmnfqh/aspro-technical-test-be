<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/modules/about/about.php';
require __DIR__ . '/modules/contact/contact.php';
require __DIR__ . '/modules/category/category.php';
require __DIR__ . '/modules/posts/posts.php';
require __DIR__ . '/modules/projects/project.php';
require __DIR__ . '/modules/project/project.php';
require __DIR__ . '/modules/post/post.php';
require __DIR__ . '/modules/authentication/auth.php';
require __DIR__ . '/modules/dashboard/myposts/myposts.php';
require __DIR__ . '/modules/dashboard/myprojects/myprojects.php';
require __DIR__ . '/modules/dashboard/users/user.php';


Route::get('/', function () {
    return view('home', ["title" => "Home Page", "header" => "Welcome Home Page"]);
});

Route::get('/dashboard', function () {
    return view('components.dashboard.index', ["title" => "Dashboard Page", "main" => "test", "header" => "Welcome Dashboard Page"]);
})->middleware('auth')->name('dashboard');
