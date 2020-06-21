<?php

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
Auth::routes();
Route::redirect('/', 'mainpage');

Route::get('/', 'IndexController@index');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/github', 'Auth\LoginController@github');
Route::get('/login/github/redirect', 'Auth\LoginController@githubRedirect');


Route::get('/article/{id}', 'ArticleController@show')->name('showArticle');

Route::get('article/page/add', 'ArticleController@create')->name('newArticle');
Route::post('article/page/add', 'ArticleController@store')->name('storeArticle');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');

Route::get('/article/page/edit/{article}', 'ArticleController@showArticleEdit')->name('showArticleEdit');
Route::put('/article/page/edit/{article}', 'ArticleController@updateArticle')->name('updateArticle');

Route::delete('/article/page/delete/{article}', 'ArticleController@delete')->name('deleteArticle');

