<?php

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

Route::post('auth/login', 'AuthController@login');
Route::delete('auth/logout', 'AuthController@logout');
Route::put('auth/refresh', 'AuthController@refresh');
Route::get('auth/me', 'AuthController@me');

Route::apiResources([
    'users' => 'UserController',
]);
