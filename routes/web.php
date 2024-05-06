<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/register-profile', function () {
    return view('register-profile');
});

Route::post('/register', function (Request $request) {
    return view('register-profile', [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'nickname' => $request->input('nickname'),
        'password' => $request->input('password'),
        'password_confirmation' => $request->input('password_confirmation')
    ]);
})->name('register.redirect');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
