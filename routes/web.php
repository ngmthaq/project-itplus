<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Category;
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

// Homepage
Route::get('/', function() {
    return view('web.main.homepage', [
        'categories' => Category::all(),
        'site' => 'homepage'
    ]);
});

// Register
Route::get('/register', [RegisterController::class, 'show'])
    ->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register');

// Verify email
Route::get('/verify/{user:remember_token}', [RegisterController::class, 'verify'])
    ->name('verify')
    ->where(['user' => '[a-zA-Z0-9]+']);

// Login
Route::get('/login', [LoginController::class, 'show'])
    ->name('login.show');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');