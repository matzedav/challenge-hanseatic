<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\QuoteController;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/quotes', [QuoteController::class, 'quotes'])->middleware('auth:sanctum');

