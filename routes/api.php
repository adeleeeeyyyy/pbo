<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\PerjalananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// API Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/perjalanan', [PerjalananController::class, 'send']);
});
