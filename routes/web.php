<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\User\UserController;
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
Route::get('/', [DefaultController::class, 'index']);

// Register
Route::get('/register', [RegisterController::class, 'show'])
    ->name('register.show')
    ->middleware(['authUserCantAccessToLoginAndRegister']);
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register')
    ->middleware(['authUserCantAccessToLoginAndRegister']);

// Verify email
Route::get('/verify/{user:remember_token}', [RegisterController::class, 'verify'])
    ->name('verify')
    ->where(['user' => '[a-zA-Z0-9]+'])
    ->middleware(['authUserCantAccessToLoginAndRegister']);

// Login
Route::get('/login', [LoginController::class, 'show'])
    ->name('login.show')
    ->middleware(['authUserCantAccessToLoginAndRegister']);
Route::post('/login', [LoginController::class, 'login'])
    ->name('login')
    ->middleware(['authUserCantAccessToLoginAndRegister']);

// Logout
Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// Change password
Route::get('password/change', [UserController::class, 'changePasswordForm'])
    ->name('user.changePasswordForm')
    ->middleware(['authCheck']);
Route::put('password/change', [UserController::class, 'changePassword'])
    ->name('user.changePassword')
    ->middleware('authCheck');

// Reset password
Route::get('password/email', [UserController::class, 'getEmailForm'])
    ->name('user.getEmail');
Route::post('password/email', [UserController::class, 'sendEmail'])
    ->name('user.sendEmail');
Route::get('password/reset/{user:remember_token}', [UserController::class, 'resetPasswordForm'])
    ->name('user.resetPasswordForm')
    ->where(['user' => '[a-zA-Z0-9]+']);
Route::put('password/reset/{user:remember_token}', [UserController::class, 'resetPassword'])
    ->name('user.resetPassword')
    ->where(['user' => '[a-zA-Z0-9]+']);