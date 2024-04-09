<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/get-countries', [RegisterController::class, 'getCountries'])->name('getCountries');
Route::get('/get-states', [RegisterController::class, 'getStates'])->name('getStates');
Route::get('/get-cities', [RegisterController::class, 'getCities'])->name('getCities');

