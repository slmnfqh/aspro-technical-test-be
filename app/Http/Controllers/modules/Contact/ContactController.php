<?php

namespace App\Http\Controllers\modules\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        return view('contact', ["email" => "iqbal@gmail.com", "socialMedia" => "slmnfqh" ,"title" => "Contact Page", "header" => "Welcome Contact Page"]);
    }
}
