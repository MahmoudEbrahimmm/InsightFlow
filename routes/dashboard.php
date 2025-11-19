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
        'roles:admin',
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ],
    'prefix' => LaravelLocalization::setLocale() . '/dashboard',
    'as' => 'dashboard.'
], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('posts', PostsController::class);
});
