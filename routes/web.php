<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login/process', [UserController::class, 'login'])->name('login.process');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');

Route::post('/register/process', [UserController::class, 'register'])->name('register.process');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::resource('dashboard', App\Http\Controllers\DashboardController::class)->middleware('auth');
Route::resource('test', App\Http\Controllers\TestController::class);
Route::resource('distributors', App\Http\Controllers\DistributorController::class)->middleware('auth');
