<?php

use App\Http\Livewire\Articles;
use App\Http\Livewire\Comments;
use App\Http\Livewire\CreateArticle;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\ViewArticle;
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

Route::get('/', HomePage::class)->name('Home');

Route::get('/articles/edit/{id}', CreateArticle::class)->name('articles.edit')->middleware('auth');
Route::get('/articles', Articles::class)->name('articles.index')->middleware('auth');
Route::get('/articles/{id}', ViewArticle::class)->name('ViewArticle');

Route::get('/comments/{type}/{id}', Comments::class)->name('comments');



