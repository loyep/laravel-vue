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
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('register', 'Auth\RegisterController@register')->name('register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
});

Route::prefix('/')->middleware(['auth:api'])->as('admin.')->group(function () {
    Route::get('user/profile', 'UserController@profile')->name('profile');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::apiResource('user', 'UserController');
    Route::apiResource('tag', 'TagController');
    Route::apiResource('post', 'PostController');
    Route::apiResource('comment', 'CommentController');
    Route::apiResource('category', 'CategoryController');
    Route::apiResource('setting', 'SettingController');
    Route::apiResource('role', 'RoleController');
    Route::get('statistics', 'PrismController@statistics');

    Route::post('upload', 'MediaController@upload');
});
