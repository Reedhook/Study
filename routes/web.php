<?php

use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Category\CategoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

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

Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController');
    });

    Route::name('admin.')->group(function () {
        Route::name('category.')->group(function () {
            Route::group([ 'prefix' => 'categories', 'controller' => CategoryController::class],
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
            Route::group(['prefix' => 'tags','controller'=>TagController::class],
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
            Route::group(['prefix' => 'posts','controller'=>PostController::class],
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
    });
});



