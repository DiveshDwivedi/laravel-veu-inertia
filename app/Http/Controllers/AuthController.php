<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function home() {
        $users = User::paginate(10);

        return Inertia::render('Home', ['users' => $users]);
    }

    function register(Request $request)  {
        // input validate 
        $validated = $request->validate([
            'name' => 'string|required|min:4|max:20',
            'email' => 'email|required|max:221|unique:users',
            'password' => 'required|confirmed|min:8|max:21',
            'avatar' => 'nullable|file|max:300'
        ]);


        if ($request->hasFile('avatar')) {
            // Storage::disk('local')->put('avatars', $request->avatar); // storage/app/private
            $path = Storage::disk('public')->put('avatars', $request->avatar);  // storage/app/public
            // s3 
        }
        $validated['avatar'] = $path ?? null;
        
        // Register user 
        $user = User::create($validated);

        // Login use 
        Auth::login($user);
        
        // Authentication check 
        return redirect()->route('dashboard');
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
        return redirect()->route('login');
        // return redirect('/');
    }
}
