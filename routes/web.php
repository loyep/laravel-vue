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
Route::get('/', 'HomeController@index')->name('home');

// 搜索页
Route::get('search', 'HomeController@search')->name('search');
Route::get('search/{q}', 'HomeController@search')->name('search.show');

// 短链接
Route::get('t/{slug}', 'LinkController@short')->name('short');

// 友情链接
Route::get('links', 'LinkController@index')->name('short');

// 作者页
Route::get('author/{name}', 'UserController@show')->name('user.show');

// 文章页
Route::get('post/{slug}', 'PostController@show')->name('post.show');
Route::post('post/{id}/like', 'PostController@like')->name('post.like');

// 分类页
Route::get('category/{slug}', 'CategoryController@show')->name('category.show');

// 标签页
Route::get('tag/{slug}', 'TagController@show')->name('tag.show');

// 热门标签
Route::get('tags', 'TagController@index')->name('tag.index');

// 热门标签
Route::get('history', 'HomeController@history')->name('history');
