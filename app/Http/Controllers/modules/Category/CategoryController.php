<?php

namespace App\Http\Controllers\modules\Category;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show(Category $category)
    {
        return view('posts', [
            "title"  => "Article in Category",
            "header" => count($category->posts) . " Article in Category: '" . $category->name . "'",
            "posts"  => $category->posts
        ]);
    }
}
