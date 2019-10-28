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

// 首页
Route::get('/', 'HomeController@home');

// 作者页
Route::get('author/{slug}', 'AuthorController@show')->name('author.show');

// 标签页
Route::get('tags', 'TagController@index')->name('tag.index');
Route::get('tag/{slug}', 'TagController@show')->name('tag.show');

// 专题页
Route::get('topics', 'TopicController@index')->name('topic.index');
Route::get('topic/{slug}', 'TopicController@show')->name('topic.show');

// 分类页
Route::get('categories', 'CategoryController@index')->name('category.index');
Route::get('category/{slug}', 'CategoryController@show')->name('category.show');

// 文章页
Route::get('article/{slug}', 'ArticleController@show')->name('article.show');
Route::get('random-post', 'ArticleController@random')->name('article.random');

Route::get('history', 'HomeController@history')->name('history');

Route::get('search', 'HomeController@search')->name('search');

//
Route::group(['middleware' => ['auth']], function () {

    Route::get('admin', 'HomeController@dashboard')->name('dashboard');
    Route::get('admin/{any}', 'HomeController@dashboard')->where('any', '.*');

    Route::get('user', 'UserController@home')->name('user.home');
    Route::get('user/articles', 'UserController@articles')->name('user.articles');
    Route::get('user/favorites', 'UserController@favorites')->name('user.favorites');
    Route::get('profile', 'UserController@showProfile')->name('user.profile');
    Route::get('user/comments', 'UserController@comments')->name('user.comments');

});

// User Center
Route::group(['middleware' => ['auth'], 'prefix' => 'api', 'namespace' => 'Api'], function () {

    Route::get('profile', 'UserController@showProfile');
    Route::post('profile', 'UserController@profile');
    Route::get('user/articles', 'UserController@articles');
});

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::post('article-like', 'ArticleController@like');
});
