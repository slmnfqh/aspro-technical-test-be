<?php

namespace App\Http\Controllers\modules\User;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('posts', [
            "title"  => "User Posts",
            "header" => count($user->posts) . " Articles By " . "'" . $user->name . "'",
            "posts"  => $user->posts
        ]);
    }

}
