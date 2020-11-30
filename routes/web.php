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

Route::get('/', 'HomeController@index')->name('startpage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//resource route for articles, to show list of routes and names please run 'php artisan route:list'
Route::resource('articles', 'ArticleController');

//route for index view filtered by requested tag
Route::get('/articles/tagged/{tag}', 'ArticleController@indexTagged')->name('articles.indexTagged');

// the following route is only accessible if middleware 'auth' and 'is_admin' are passed
Route::get('/admin', function () {
    return view('admin.index');
})
    ->middleware(['auth', 'is_admin'] )
    ->name('admin.index');
