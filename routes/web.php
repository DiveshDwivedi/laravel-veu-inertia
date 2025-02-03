<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;

Route::middleware('guest')->group(function() {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function(){
    Route::inertia('/dashboard', 'Auth/Dashboard')->name('dashboard');

    Route::get('/', [AuthController::class, 'home'])->name('home');


    Route::inertia('/contact', 'Contact')->name('contact');
    Route::inertia('/about', 'About')->name('about');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});