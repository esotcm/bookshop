<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', BookController::class);
    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
        Route::resource('books',App\Http\Controllers\User\BookController::class);
    });
});

Route::get('user/books/check_slug','BookController@checkSlug')->name('user.books.checkSlug');

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

