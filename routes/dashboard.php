<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostsController;
use App\Http\Controllers\Dashboard\UsersController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => ['auth','roles:admin'],
    'prefix' => 'dashboard',
    'as' => 'dashboard.'

], function() {
    Route::get('dashboard',[DashboardController::class,'index'])->name('index');
    Route::resource('users',UsersController::class);
    Route::resource('categories',CategoriesController::class);
    Route::resource('posts',PostsController::class);
});

