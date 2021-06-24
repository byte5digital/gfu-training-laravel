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

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;

Route::get('/', function(){
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::name('articles.')->prefix('articles')->group(function() {

        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::post('/', [ArticleController::class, 'store'])->name('store');
        Route::get('category/{category}', [ArticleController::class, 'indexCategorized'])->name('categorized');

    });

    Route::name('article.')->prefix('article')->group(function() {

        Route::get('edit/{article}', [ArticleController::class, 'edit'])->name('edit');
        Route::get('create', [ArticleController::class, 'create'])->name('create');

        Route::put('{id}', [ArticleController::class, 'update'])->name('update');

        Route::prefix('{article}')->group(function() {
            Route::get('/', [ArticleController::class, 'show'])->name('show');
            Route::delete('/', [ArticleController::class, 'destroy'])->name('destroy');
        });

    });

});

// reosurce Routes -> see list of routes with php artisan routes:list
Route::resource('category', CategoryController::class)->middleware(['verified', 'is_admin']);

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/mail', [MailController::class, 'showForm'])->name('mail.form');
Route::post('/mail', [MailController::class, 'sendTestMail'])->name('mail.send');
