<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');

Route::patch('update', [App\Http\Controllers\UserController::class, 'update'])->name('update');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
