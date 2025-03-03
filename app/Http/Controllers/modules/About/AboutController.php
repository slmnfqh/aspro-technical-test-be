<?php

namespace App\Http\Controllers\modules\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
    
        return view('about', ["nama" => "Iqbal", "email" => "iqbal@gmail.com","title" => "About Page", "header" => "Welcome About Page"]);
    }
}
