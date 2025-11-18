<?php

use App\Http\Controllers\Dashboard\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, ['ar', 'en'])) {
        session(['locale' => $lang]);
        app()->setLocale($lang);
    }
    return redirect()->back();
})->name('lang.switch');


Route::view('/', 'index')->name('home');

Route::get('settings/index',[SettingsController::class,'index'])
    ->name('settings');
Route::post('settings/update/{setting}',[SettingsController::class,'update'])
    ->name('settings.update');

