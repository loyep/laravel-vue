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

//Auth::routes();

Route::middleware([\App\Http\Middleware\CacheResponse::class])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::get('search', 'HomeController@search')->name('search');

Route::get('t/{slug}', 'LinkController@shortLink')->name('short');

Route::get('user/{id}', 'UserController@show')->name('user.show');
