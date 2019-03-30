<?php

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

Route::prefix('/')->middleware(['guest:api'])->as('admin.')->group(function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
});

Route::prefix('/')->middleware(['auth:api'])->as('admin.')->group(function () {
    Route::get('user/profile', 'UserController@profile');
    Route::post('logout', 'Auth\LoginController@logout');

    Route::resource('user', 'UserController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');
    Route::resource('comment', 'CommentController');
    Route::resource('category', 'CategoryController');
    Route::resource('setting', 'SettingController');
    Route::resource('role', 'RoleController');
    Route::get('statistics', 'PrismController@statistics');
});
