<?php
namespace App\Http\Controllers;
// Author: All 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController; 
use App\Http\Controllers\ForgetPasswordController;

// Authentication endpoints
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [LogoutController::class, 'logout']);
Route::post('/forgot-password', [ForgetPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [ForgetPasswordController::class, 'resetPassword']);

// city and property end points
Route::get('/properties/search', [PropertyController::class, 'searchAndFilter']);
Route::resource('cities', CityController::class);
Route::resource('properties', PropertyController::class);