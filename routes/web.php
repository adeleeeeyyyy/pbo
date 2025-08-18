<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\PerjalananController;
use Illuminate\Support\Facades\Route;




Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login-form', [AuthController::class, 'login'])->name('login-form');


Route::middleware('auth')->group(function () {
    Route::get('/', [PerjalananController::class, 'index'])->name('home');
    Route::post('/travel/send', [PerjalananController::class, 'store'])->name('travel.store');
});
