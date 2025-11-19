<?php

use App\Http\Controllers\Dashboard\SettingsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 

    
    Route::view('/', 'index')->name('home');
    
    Route::get('settings/index',[SettingsController::class,'index'])
    ->name('settings');
    
    Route::post('settings/update/{setting}',[SettingsController::class,'update'])
    ->name('settings.update');
    
});
