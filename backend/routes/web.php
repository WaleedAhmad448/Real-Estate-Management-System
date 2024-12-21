<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('password.reset');
