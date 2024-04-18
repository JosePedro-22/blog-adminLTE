<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'store');
    Route::post('logout', 'destroy')->name('logout');
})->middleware('guest');

Route::get('dashboard', [MainController::class, 'index'])->middleware('auth')->name('dashboard');

Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);

Route::resource('categories', CategoryController::class);

Route::resource('tags', TagController::class);

Route::get('file/{hash}', FileController::class)->name('file');
