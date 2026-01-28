<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
Route::resource('test', App\Http\Controllers\TestController::class);
Route::resource('distributors', App\Http\Controllers\DistributorController::class);


