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

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->prefix('admin')->group(function () {
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

// Generates all routes for resource Controller -> see routes with php artisan route:list
// Route::resource('blog', 'BlogController');

Route::get('/admin', function(){
    return view('admin.index');
})->middleware(['auth', 'is_admin'])
->name('admin.index');

Route::get('user/edit', 'UserController@edit')->name('user.edit');
Route::put('user', 'UserController@update')->name('user.update');



Route::middleware(['auth'])->prefix('category')->group(function () {
    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::get('category/{category}', 'CategoryController@show')->name('category.show');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy');
});