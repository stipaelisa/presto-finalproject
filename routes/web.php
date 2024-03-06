<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/article/create',[ArticleController::class,'create'])->name('article.create')->middleware('auth');

Route::get('article/category/{category}', [ArticleController::class, 'getByCategory'])->name('article.category');

Route::get('article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('article/index', [ArticleController::class, 'index'])->name('article.index');

Route::get('auth/dashboard/{auth}', [PublicController::class, 'dashboard'])->name('auth.dashboard')->middleware('auth');

Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');

Route::get('/revisor/show/{article}',[RevisorController::class,'show'])->middleware('isRevisor')->name('revisor.show');

Route::patch('/accetta/annuncio/{article}',[RevisorController::class,'acceptArticle'])->middleware('isRevisor')->name('revisor.accept_article');

Route::patch('/rifiuta/annuncio/{article}',[RevisorController::class,'rejectArticle'])->middleware('isRevisor')->name('revisor.reject_article');

Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/ricerca/annuncio', [PublicController::class, 'searchArticles'])->name('articles.search');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

Route::get('/about-us', [PublicController::class, 'aboutus'])->name('about-us');