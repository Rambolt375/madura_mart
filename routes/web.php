<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributorController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login/process', [UserController::class, 'login'])->name('login.process');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register/process', [UserController::class, 'register'])->name('register.process');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('test', TestController::class);
Route::resource('distributors', DistributorController::class)->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('purchases', PurchaseController::class)->middleware('auth');
