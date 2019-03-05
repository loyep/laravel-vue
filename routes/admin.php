<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/')->middleware(['guest:api'])->group(function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

});

Route::prefix('/')->middleware(['auth:api'])->group(function () {
    Route::get('user/profile', 'Admin\UserController@profile');
    Route::post('logout', 'Auth\LoginController@logout');
});

