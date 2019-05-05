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

Route::prefix('/')->middleware(['auth:api'])->as('admin.')->group(function () {

    // Auth
    Route::get('user/profile', 'UserController@profile')->name('profile');

    // Api resource
    Route::apiResource('user', 'UserController');
    Route::apiResource('tag', 'TagController');
    Route::apiResource('post', 'PostController');
    Route::apiResource('comment', 'CommentController');
    Route::apiResource('category', 'CategoryController');
    Route::apiResource('setting', 'SettingController');
    Route::apiResource('role', 'RoleController');

    // Dashboard
    Route::get('statistics', 'PrismController@statistics');

    // File
    Route::post('upload', 'MediaController@upload');
});
