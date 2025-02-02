<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function register(Request $request)  {
        // input validate 
        $validated = $request->validate([
            'name' => 'string|required|min:4|max:20',
            'email' => 'email|required|max:221|unique:users',
            'password' => 'required|confirmed|min:8|max:21'
        ]);

        // Register user 
        $user = User::create($validated);

        // Login use 
        Auth::login($user);
        
        // Authentication check 

        return redirect()->route('home');
    }

     /**
     * Handle Login's an authentication attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:221'],
            'password' => ['required', 'min:8', 'max:21'],
        ]);
 
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
        // return redirect('/');
    }
}
