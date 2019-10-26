<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('user/details', 'UserController@details');
    Route::post('user/update', 'UserController@update');
    Route::post('user/update-password', 'UserController@updatePassword');

    Route::post('club/join', 'ClubController@join');
    Route::post('club/leave', 'ClubController@leave');
});

Route::get('general', 'GeneralController@index');

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('forgot', 'Auth\ForgotPasswordController@forgot');
Route::post('reset', 'Auth\ResetPasswordController@reset');

Route::get('club/{id}', 'ClubController@get');
Route::get('club/{id}/users', 'ClubController@users');
Route::get('club/list', 'ClubController@list');

Route::get('game/list', 'GameController@list');
Route::get('game/{id}', 'GameController@get');
