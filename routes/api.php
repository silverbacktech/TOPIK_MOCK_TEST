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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','UserController@login');
Route::post('/register','UserController@register')->middleware('auth:api');
Route::post('/user/edit/{id}','UserController@edit')->middleware('auth:api');
Route::post('/user/delete/{id}','UserController@delete')->middleware('auth:api');

Route::post('/language', 'LanguageController@add')->middleware('auth:api');
Route::post('/language/delete/{id}', 'LanguageController@delete')->middleware('auth:api');
Route::post('/language/edit/{id}', 'LanguageController@edit')->middleware('auth:api');

Route::post('/set/{id}', 'SetController@add')->middleware('auth:api');
Route::post('/set/delete/{id}','SetController@delete')->middleware('auth:api');
Route::post('/set/edit/{id}','SetController@edit')->middleware('auth:api');

Route::post('/reading/{id}', 'ReadingQuestionController@create')->middleware('auth:api');
Route::post('/reading/edit/{id}', 'ReadingQuestionController@edit')->middleware('auth:api');
Route::post('/reading/delete/{id}', 'ReadingQuestionController@destroy')->middleware('auth:api');

Route::post('/reading/options/{id}', 'ReadingOptionsController@create')->middleware('auth:api');
Route::post('/reading/options/edit/{id}', 'ReadingOptionsController@edit')->middleware('auth:api');
Route::post('/reading/options/delete/{id}', 'ReadingOptionsController@destroy')->middleware('auth:api');