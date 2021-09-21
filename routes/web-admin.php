<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Post\PostController;
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

Route::prefix('admin')->middleware(['authCheck', 'isAdmin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // Categories Management
    Route::get('/categories', [AdminController::class, 'categories'])
        ->name('admin.categories');

    // Media
    Route::prefix('/media')->group(function () {
        // Add image
        Route::get('/image', [AdminController::class, 'addImageForm'])
            ->name('admin.addImageForm');
        Route::post('/image', [AdminController::class, 'addImage'])
            ->name('admin.addImage')
            ->middleware('isImage');

        // Add video
        Route::get('/video', [AdminController::class, 'addVideoForm'])
            ->name('admin.addVideoForm');
        Route::post('/video', [AdminController::class, 'addVideo'])
            ->name('admin.addVideo')
            ->middleware('isVideoMp4');

        // Media store
        Route::get('/', [AdminController::class, 'mediaStore'])
            ->name('admin.mediaStore');
    });

    // Posts with text and image => casual post
    Route::prefix('/post')->group(function () {
        // Create casual post
        Route::get('/create', [PostController::class, 'createCasualPostForm'])
            ->name('post.createCasualPostForm');
        Route::post('/create', [PostController::class, 'createCasualPost'])
            ->name('post.createCasualPost');

        // All casual posts
        Route::get('/', [PostController::class, 'manageCasualPost'])
            ->name('post.manageCasualPost');
    });
});
