<?php

namespace App\Http\Controllers\modules\Authentication;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function indexLogin() {
        
        return view('authentication.login', 
        ["title" => "Authentication Page", "header" => "Welcome Authentication Page"]);
    }

    public function indexRegister() {
        
        return view('authentication.register', 
        ["title" => "Authentication Page", "header" => "Welcome Authentication Page"]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:10|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);
    
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
    
        return back()->with('success', 'Registration successful! Please login');
    }


    public function authenticate(Request $request)

    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->back()->with('success', 'Login successful!');
        }

        return back()->with('error', 'Email or Password is incorrect!',
        )->withInput(); 
        // witInput = form tetap terisi jika ada error
    }


    public function logout(Request $request) 
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    
}
