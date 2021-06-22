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

Route::get('/', function(){
    return view('welcome');
});

Route::middleware('auth')->group(
    function(){
        Route::get('/articles', 'ArticleController@index')->name('articles.index');
        Route::get('/articles/create', 'ArticleController@create')->name('article.create');
        Route::post('/articles', 'ArticleController@store')->name('article.store');
        Route::get('/article/{article}', 'ArticleController@show')->name('article.show');
        Route::get('/article/edit/{article}', 'ArticleController@edit')->name('article.edit');
        Route::put('/article/{id}', 'ArticleController@update')->name('article.update');
        Route::delete('/article/{article}', 'ArticleController@destroy')->name('article.destroy');
        Route::get('article/category/{category}', 'ArticleController@indexCategorized')->name('articles.categorized');
    }
);

// reosurce Routes -> see list of routes with php artisan routes:list
Route::resource('category', 'CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
