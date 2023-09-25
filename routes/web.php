<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Personal\Commentary\CommentaryController;
use App\Http\Controllers\Personal\Like\LikeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);
Route::get('/', IndexController::class)->name('main.index');


Route::group(['prefix' => 'posts', 'controller' => App\Http\Controllers\Post\PostController::class], function () {
    Route::get('/', 'index')->name('post.index');
    Route::get('/{post}', 'show')->name('post.show');
    Route::group(['prefix' => '{post}/comments', 'controller' => App\Http\Controllers\Post\Comment\CommentController::class], function () {
        Route::post('/','store')->name('post.comment.store');
    });
    Route::group(['prefix' => '{post}/likes', 'controller' => App\Http\Controllers\Post\Like\LikeController::class],function () {
        Route::post('/','store')->name('post.like.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']],
    function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', 'IndexController')->name('personal.main.index');
        });

        Route::name('personal.')->group(function () {
            Route::name('like.')->group(function () {
                Route::group(['prefix' => 'likes', 'controller' => LikeController::class], function () {
                    Route::get('/', 'index')->name('index');
                    Route::delete('/{post}', 'delete')->name('delete');
                });
            });
            Route::name('commentary.')->group(function () {
                Route::group(['prefix' => 'commentaries', 'controller' => CommentaryController::class], function () {
                    Route::get('/', 'index')->name('index');
                    Route::delete('/{comment}', 'delete')->name('delete');
                    Route::patch('/{comment}', 'update')->name('update');
                    Route::get('/{comment}/edit', 'edit')->name('edit');
                });
            });
        });
    });


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']],
    function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', 'IndexController')->name('admin.main.index');
        });

        Route::name('admin.')->group(function () {
            Route::name('category.')->group(function () {
                Route::group(['prefix' => 'categories', 'controller' => CategoryController::class],
                    function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/{category}', 'show')->name('show');
                        Route::get('/{category}/edit', 'edit')->name('edit');
                        Route::patch('/{category}', 'update')->name('update');
                        Route::delete('/{category}', 'delete')->name('delete');
                    });
            });
            Route::name('tag.')->group(function () {
                Route::group(['prefix' => 'tags', 'controller' => TagController::class],
                    function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/{tag}', 'show')->name('show');
                        Route::get('/{tag}/edit', 'edit')->name('edit');
                        Route::patch('/{tag}', 'update')->name('update');
                        Route::delete('/{tag}', 'delete')->name('delete');
                    });
            });
            Route::name('post.')->group(function () {
                Route::group(['prefix' => 'posts', 'controller' => PostController::class],
                    function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/{post}', 'show')->name('show');
                        Route::get('/{post}/edit', 'edit')->name('edit');
                        Route::patch('/{post}', 'update')->name('update');
                        Route::delete('/{post}', 'delete')->name('delete');
                    });
            });
            Route::name('user.')->group(function () {
                Route::group(['prefix' => 'users', 'controller' => UserController::class],
                    function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/{user}', 'show')->name('show');
                        Route::get('/{user}/edit', 'edit')->name('edit');
                        Route::patch('/{user}', 'update')->name('update');
                        Route::delete('/{user}', 'delete')->name('delete');
                    });
            });
        });
    });






