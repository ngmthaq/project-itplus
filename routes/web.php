<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\Post\CategoryController;
use App\Http\Controllers\Post\PostController;
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
Route::post('/login-modal', [LoginController::class, 'modalLogin'])
    ->name('login.modalLogin')
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

// Breaking news
Route::get('/breaking-news', [DefaultController::class, 'breakingNews'])
    ->name('default.breakingNews');

// Load more breaking news posts
Route::post('/breaking-news/{post}', [DefaultController::class, 'loadmoreBreakingNews'])
    ->name('default.loadmoreBreakingNews')
    ->where(['post' => '[0-9]+']);

// Categories with post
Route::get('/categories/{category}/posts', [CategoryController::class, 'showPosts'])
    ->name('category.showPosts')
    ->where(['category' => '[0-9]+']);

// Load more casual posts
Route::post('/categories/{category}/casual/{total}', [CategoryController::class, 'loadmoreCasualPosts'])
    ->name('category.loadmoreCasualPosts')
    ->where([
        'category' => '[0-9]+',
        'total' => '[0-9]+'
    ]);

// Load more video posts
Route::post('/categories/{category}/video/{total}', [CategoryController::class, 'loadmoreVideoPosts'])
    ->name('category.loadmoreVideoPosts')
    ->where([
        'category' => '[0-9]+',
        'total' => '[0-9]+'
    ]);

// Video page
Route::get('videos', [CategoryController::class, 'showVideos'])
    ->name('category.showVideos');

// Load more video in video page
Route::post('/videos/{total}', [CategoryController::class, 'loadmoreVideoPage'])
    ->where(['total' => '[0-9]+']);

// Show post detail
Route::get('/posts/{post}', [PostController::class, 'showPostDetail'])
    ->name('post.showPostDetail')
    ->where(['post' => '[0-9]+']);

// Add comment
Route::post('/add-comment/{post}/comment/{total}', [UserController::class, 'addComment'])
->name('user.addComment')
->where(['post' => '[0-9]+'])
->middleware('authCheck');

// Show next six comments
Route::post('/show-more-comment/{post}/comment/{total}', [UserController::class, 'showNextSixComments'])
    ->name('user.showNextSixComments')
    ->where([
        'post' => '[0-9]+',
        'total' => '[0-9]+'
    ]);
