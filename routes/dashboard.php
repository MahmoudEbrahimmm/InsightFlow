<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UsersController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => ['auth','roles:admin'],
    'prefix' => 'admin',
    'as' => 'dashboard.'

], function() {
    Route::get('dashboard',[DashboardController::class,'index'])->name('index');
    Route::resource('users',UsersController::class);
});

