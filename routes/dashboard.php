<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostsController;
use App\Http\Controllers\Dashboard\UsersController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'middleware' => [
        'auth',
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ],
    'prefix' => LaravelLocalization::setLocale() . '/dashboard',
    'as' => 'dashboard.'
], function () {

    Route::get('/', [DashboardController::class, 'index'])->middleware('roles:admin')->name('index');
    Route::resource('users', UsersController::class)->middleware('roles:admin');
    Route::resource('categories', CategoriesController::class)->middleware('roles:admin');;
    Route::resource('posts', PostsController::class);
});
