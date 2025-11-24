<?php

use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 

    
    
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/posts/{id}', [HomeController::class, 'show'])->name('posts.show');
    
    Route::get('settings/index',[SettingsController::class,'index'])->middleware('roles:admin')
    ->name('settings');
    
    Route::post('settings/update/{setting}',[SettingsController::class,'update'])->middleware('roles:admin')
    ->name('settings.update');
        
});
