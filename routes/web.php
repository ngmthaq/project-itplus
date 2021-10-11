<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\Post\CategoryController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Socialite\FacebookController;
use App\Http\Controllers\Socialite\GithubController;
use App\Http\Controllers\Socialite\GoogleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserInformationController;
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

// Contact
Route::get('/contact', [DefaultController::class, 'contact'])
    ->name('contact');
Route::post('/feedback', [DefaultController::class, 'addFeedback'])
    ->name('addFeedback');

// About us
Route::get('/about', [DefaultController::class, 'about'])
    ->name('about');

// Policy
Route::get('/policy', [DefaultController::class, 'policy'])
    ->name('policy');

// Terms
Route::get('/terms', [DefaultController::class, 'terms'])
    ->name('terms');

// Register
Route::get('/register', [RegisterController::class, 'show'])
    ->name('register.show')
    ->middleware(['authUserCantAccessToLoginAndRegister']);
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register')
    ->middleware(['authUserCantAccessToLoginAndRegister']);

// Verify email
Route::get('/verify/{user:token}', [RegisterController::class, 'verify'])
    ->name('verify')
    ->where(['user' => '[a-zA-Z0-9]+'])
    ->middleware(['authUserCantAccessToLoginAndRegister']);

// Login using facebook
Route::prefix('facebook')->group(function () {
    Route::get('auth', [FacebookController::class, 'loginUsingFacebook'])
        ->name('facebook.loginUsingFacebook');
    Route::get('callback', [FacebookController::class, 'callbackFromFacebook'])
        ->name('facebook.callbackFromFacebook');
});

// Login using google
Route::prefix('google')->group(function () {
    Route::get('auth', [GoogleController::class, 'loginUsingGoogle'])
        ->name('google.loginUsingGoogle');
    Route::get('callback', [GoogleController::class, 'callbackFromGoogle'])
        ->name('google.callbackFromGoogle');
});

// Login using github
Route::prefix('github')->group(function () {
    Route::get('auth', [GithubController::class, 'loginUsingGithub'])
        ->name('github.loginUsingGithub');
    Route::get('callback', [GithubController::class, 'callbackFromGithub'])
        ->name('github.callbackFromGithub');
});

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
Route::get('password/reset/{user:token}', [UserController::class, 'resetPasswordForm'])
    ->name('user.resetPasswordForm')
    ->where(['user' => '[a-zA-Z0-9]+']);
Route::put('password/reset/{user:token}', [UserController::class, 'resetPassword'])
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
    ->where(['post' => '[0-9]+'])
    ->middleware('isValidPost');

Route::middleware(['authCheck'])->group(function () {
    // Add comment
    Route::post('/add-comment/{post}/comment/{total}', [UserController::class, 'addComment'])
        ->name('user.addComment')
        ->where(['post' => '[0-9]+']);

    // Edit comment
    Route::put('/edit-comment/{comment}', [UserController::class, 'editComment'])
        ->name('user.editComment')
        ->where(['comment' => '[0-9]+'])
        ->middleware('isUserOfComment');

    // Delete comment
    Route::delete('/delete-comment/{comment}', [UserController::class, 'deleteComment'])
        ->name('user.deleteComment')
        ->where(['comment' => '[0-9]+'])
        ->middleware('isUserOfComment');
});

// Show next six comments
Route::post('/show-more-comment/{post}/comment/{total}', [UserController::class, 'showNextComments'])
    ->name('user.showNextComments')
    ->where([
        'post' => '[0-9]+',
        'total' => '[0-9]+'
    ]);

// Search post
Route::get('/search', [PostController::class, 'search'])
    ->name('post.search');

// User's information
Route::get('/user/information', [UserInformationController::class, 'show'])
    ->name('userInformation.show')
    ->middleware('authCheck');

// Edit user's information
Route::get('/user/information/edit', [UserInformationController::class, 'showEditForm'])
    ->name('userInformation.showEditForm')
    ->middleware('authCheck');
Route::put('/user/information/edit', [UserInformationController::class, 'edit'])
    ->name('userInformation.edit')
    ->middleware('authCheck');
