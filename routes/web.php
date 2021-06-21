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

Route::get('/home', function(){
    return view('home');
})->name('homepage');

Route::get('/articles', 'ArticleController@index');
Route::get('/articles/create', 'ArticleController@create');
Route::post('/articles', 'ArticleController@store')->name('article.create');