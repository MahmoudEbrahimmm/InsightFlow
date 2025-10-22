<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdateProfileController;
use Illuminate\Support\Facades\Route;


// LOGIN ROUTES
Route::view('/login', 'auth.login')->name('login');
Route::post('login', LoginController::class);

// REGISTER ROUTES
Route::view('/register', 'auth.register')->name('register');
Route::post('register', RegisterController::class);


// FORGOT PASSWORD ROUTES
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::post("/forgot-password", ForgotPasswordController::class)->name('password.email');


Route::middleware(['auth','auth.session'])->group(function(){
 // PROFILE ROUTES
 Route::view('/profile', 'auth.profile')->name('profile');
 Route::put('profile', UpdateProfileController::class);
 Route::post('change-password', ChangePasswordController::class);
 
 // LOGOUT ROUTES
 Route::post('logout', [LogoutController::class,'logout'])->name('logout');
 Route::post('logout/{session}',[LogoutController::class,'logoutDevice'])->name('logout_device');


});
