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
    Route::prefix('media')->group(function () {
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

    // Posts
    Route::prefix('posts')->group(function () {
        /** Casual post */
        Route::prefix('casual')->group(function () {
            /** Create casual post */
            Route::get('/create', [PostController::class, 'createCasualPostForm'])
                ->name('post.createCasualPostForm');
            Route::post('/create', [PostController::class, 'createCasualPost'])
                ->name('post.createCasualPost');

            /** All casual posts - Manage casual post */
            Route::get('/', [PostController::class, 'manageCasualPost'])
                ->name('post.manageCasualPost');
        });
        /****************END********************** */

        /** Video posts */
        Route::prefix('/video')->group(function () {
            // Manage posts
            Route::get('/', [PostController::class, 'manageVideoPost'])
                ->name('post.manageVideoPost');
            
            // Create casual post
            Route::get('/create', [PostController::class, 'createVideoPostForm'])
                ->name('post.createVideoPostForm');
            Route::post('/create', [PostController::class, 'createVideoPost'])
                ->name('post.createVideoPost');
        });
        /******************END******************** */

        /** Edit post */
        Route::middleware(['postWasNotDeleted'])->group(function () {
            /** Edit casual post */
            Route::prefix('casual')->group(function () {
                Route::get('/{post}/edit', [PostController::class, 'editCasualPostForm'])
                    ->name('post.editCasualPostForm')
                    ->where(['post' => '[0-9]+']);
                Route::post('/{post}/edit', [PostController::class, 'editCasualPost'])
                    ->name('post.editCasualPost')
                    ->where(['post' => '[0-9]+']);
            });
            /***************END******************* */

            /** Edit video post */
            Route::prefix('video')->group(function () {
                Route::get('/{post}/edit', [PostController::class, 'editVideoPostForm'])
                    ->name('post.editVideoPostForm')
                    ->where(['post' => '[0-9]+']);
                Route::post('/{post}/edit', [PostController::class, 'editVideoPost'])
                    ->name('post.editVideoPost')
                    ->where(['post' => '[0-9]+']);
            });
            /*******************END************** */

            /** Delete post */
            Route::put('/{post}/delete', [PostController::class, 'deletePost'])
                ->name('post.deletePost')
                ->where(['post' => '[0-9]+']);
            /*************END******************* */
        });
        /*****************END******************* */
    });
});
