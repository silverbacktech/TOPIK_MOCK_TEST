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

// Routes for user login authentication registration and adding
Route::post('/login','UserController@login');
Route::post('/register','UserController@register')->middleware('auth:api');
Route::post('/user/edit/{id}','UserController@edit')->middleware('auth:api');
Route::post('/user/delete/{id}','UserController@delete')->middleware('auth:api');
Route::post('/user/show/{id}','UserController@show')->middleware('auth:api');

// Route for languages
Route::post('/language', 'LanguageController@add')->middleware('auth:api');
Route::post('/language/delete/{id}', 'LanguageController@delete')->middleware('auth:api');
Route::post('/language/edit/{id}', 'LanguageController@edit')->middleware('auth:api');
Route::get('/language/show', 'LanguageController@show')->middleware('auth:api');

// Route For Sets
Route::post('/set/{id}', 'SetController@add')->middleware('auth:api');
Route::post('/set/delete/{id}','SetController@delete')->middleware('auth:api');
Route::post('/set/edit/{id}','SetController@edit')->middleware('auth:api');

// Route for question group
Route::post('/add-question-group/{id}','QuestionGroupController@store')->middleware('auth:api');
Route::post('/delete-question-group/{id}','QuestionGroupController@destroy')->middleware('auth:api');

