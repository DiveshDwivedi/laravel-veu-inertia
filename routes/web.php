<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::inertia('/', 'Home')->name('home');

Route::inertia('/contact', 'Contact')->name('contact');
Route::inertia('/about', 'About', ["name" => "Divesh"])->name('about');
Route::inertia('/register', 'Auth/Register')->name('register');
Route::post('/register', [AuthController::class, 'register']);