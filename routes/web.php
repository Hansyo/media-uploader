<?php

/* Controllers */

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');

Route::group(['prefix' => 'auth'], function () {

    Route::get('/register', [RegisterController::class, 'showRegisterForm']);
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// 自身(の情報)に関する項目
Route::group(['prefix' => 'user'], function () {
    Route::get('/{user:name}', [UserController::class, 'show'])->name('user.show');
});

Route::group(['prefix' => 'settings', 'middleware' => ['auth']], function () {
    Route::get('/', [SettingsController::class, 'edit'])->name('user.edit');
    Route::patch('/', [SettingsController::class, 'update'])->name('user.update');
    Route::delete('/', [SettingsController::class, 'destroy'])->name('user.destroy');
});

Route::group(['prefix' => 'image', 'as' => 'image.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        // 認証が必要な機能
        Route::get('/upload', [ImageController::class, 'upload'])->name('upload');
        Route::get('/create', [ImageController::class, 'create'])->name('create');
        Route::post('/', [ImageController::class, 'store'])->name('store');
        Route::group(['middleware' => 'can:editable,image'], function () {
            Route::get('/{image:id}/edit', [ImageController::class, 'edit'])->name('edit');
            Route::patch('/{image:id}', [ImageController::class, 'update'])->name('update');
            Route::delete('/{image:id}', [ImageController::class, 'destroy'])->name('destroy');
        });
    });
    // 認証が不要 (順番の関係で、後ろに持ってきたほうが良い)
    Route::get('/{image:id}', [ImageController::class, 'show'])->name('show');
    Route::get('/', [ImageController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'video', 'as' => 'video.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        // 認証が必要な機能
        Route::get('/create', [VideoController::class, 'create'])->name('create');
        Route::post('/', [VideoController::class, 'store'])->name('store');
        Route::group(['middleware' => 'can:editable,video'], function () {
            Route::get('/{video:id}/edit', [VideoController::class, 'edit'])->name('edit');
            Route::patch('/{video:id}', [VideoController::class, 'update'])->name('update');
            Route::delete('/{video:id}', [VideoController::class, 'destroy'])->name('destroy');
        });
    });
    // 認証が不要 (順番の関係で、後ろに持ってきたほうが良い)
    Route::get('/{video:id}', [VideoController::class, 'show'])->name('show');
    Route::get('/', [VideoController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'comment', 'as' => 'comment.', 'middleware' => 'auth'], function () {
    Route::post('/', [CommentController::class, 'store'])->name('store');
});
