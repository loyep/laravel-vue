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
Route::post('/', 'HomeController@index');

// 搜索页
Route::get('search', 'HomeController@search')->name('search');
Route::post('search', 'HomeController@search');

// 短链接
Route::get('t/{slug}', 'LinkController@short')->name('short');

// 友情链接
Route::get('links', 'LinkController@index')->name('short');

// 作者页
Route::get('author/{name}', 'UserController@show')->name('user.show');
Route::post('author/{name}', 'UserController@show');

// 文章页
Route::get('article/{slug}', 'ArticleController@show')->name('article.show');
Route::post('article/{id}/like', 'ArticleController@like')->name('article.like');

// 分类页
Route::get('category/{slug}', 'CategoryController@show')->name('category.show');
Route::post('category/{slug}', 'CategoryController@show');

// 标签页
Route::get('tag/{slug}', 'TagController@show')->name('tag.show');
Route::post('tag/{slug}', 'TagController@show');

// 热门标签
Route::get('tags', 'TagController@index')->name('tag.index');

// 热门标签
Route::get('history', 'HomeController@history')->name('history');
Route::post('history', 'HomeController@history');

// SiteMap
Route::get('sitemap', 'HomeController@siteMap')->name('sitemap');
Route::get('sitemap.xml', 'HomeController@siteMap');

// RSS Feed
Route::get('feed.xml', 'HomeController@feed')->name('feed');
