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
Route::any('/', 'HomeController@index')->name('home');

// 搜索页
Route::any('search', 'SearchController@index')->name('search');

// 短链接
Route::get('t/{slug}', 'LinkController@short')->name('short');

// 友情链接
Route::get('links', 'LinkController@index')->name('short');

// 作者页
Route::any('author/{name}', 'UserController@show')->name('user.show');

// 文章页
Route::get('article/{slug}', 'ArticleController@show')->name('article.show');
Route::post('article/{id}/like', 'ArticleController@like')->name('article.like');

// 分类页
Route::any('category/{slug}', 'CategoryController@show')->name('category.show');

// 专题页
Route::any('topic/{slug}', 'TopicController@show')->name('topic.show');

// 标签页
Route::any('tag/{slug}', 'TagController@show')->name('tag.show');

// 热门标签
Route::get('tags', 'TagController@index')->name('tag.index');

// 热门标签
Route::any('history', 'HistoryController@index')->name('history');

// SiteMap
Route::get('sitemap', 'FeedController@siteMap')->name('sitemap');
Route::get('sitemap.xml', 'FeedController@siteMap');

// RSS Feed
Route::get('feed.xml', 'FeedController@feed')->name('feed');

Route::get('login', 'Auth\LoginController@showLogin');
