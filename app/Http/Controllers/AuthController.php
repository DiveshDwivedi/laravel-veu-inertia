<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function register(Request $request)  {
      
        // input validate 
        $validated = $request->validate([
            'name' => 'string|required|min:4|max:20',
            'email' => 'email|required|unique',
            'password' => 'password|required|min:8|max21'
        ]);

        // Register user 

        // Login user 

        // Authentication check 
    }
}
