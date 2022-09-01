<?php

/* Controllers */

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
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

    Route::get('/login', [LoginController::class, 'showLoginForm']);
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

Route::group(['prefix' => 'image'], function () {
    // 認証が不要
    Route::get('/{id}', 'ImageController@show');

    Route::group(['middleware' => 'auth'], function () {
        // 認証が必要な機能
        Route::get('/upload', 'ImageController@upload');
        Route::get('/create', 'ImageController@create');
        Route::post('/', 'ImageController@store');
        Route::group(['middleware' => 'can:editable,image'], function () {
            Route::get('/edit', 'ImageController@edit');
            Route::patch('/{id}', 'ImageController@update');
            Route::delete('/{id}', 'ImageController@destroy');
        });
    });
});
