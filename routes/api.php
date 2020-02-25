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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => ['auth:api'], 'namespace' => 'API'], function(){
   
    Route::ApiResource('users', 'UserController');
    Route::post('/users/import', ['as'=>'users.import', 'uses'=>'UserController@import']);

});