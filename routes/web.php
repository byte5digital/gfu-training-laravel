<?php

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

Route::get('/', 'GfuController@index')->name('startpage');

// Laravel 8 Syntax Route::get('/', [GfuController::class, 'index']);

Auth::routes();

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@index')->name('home');
});

Route::prefix('blog')->group(function () {
    Route::get('/', 'BlogController@index')->name('blog.index');
    Route::get('/create', 'BlogController@create')->name('blog.create');
    Route::post('/store', 'BlogController@store')->name('blog.store');
    Route::post('/update/{blog}', 'BlogController@update')->name('blog.update');
    Route::post('/destroy/{blog}', 'BlogController@destroy')->name('blog.destroy');
    Route::get('/show/{blog}', 'BlogController@show')->name('blog.show');
});
