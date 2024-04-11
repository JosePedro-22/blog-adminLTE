<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'store');
    Route::post('logout', 'destroy')->name('logout');
})->middleware('guest');

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
