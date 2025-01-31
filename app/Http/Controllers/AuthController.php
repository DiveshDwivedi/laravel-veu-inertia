<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // Login user 
        Auth::login($user);
        
        // Authentication check 
    }
}
