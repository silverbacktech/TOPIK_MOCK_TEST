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
Route::post('/user/status/{id}','UserController@changeStatus')->middleware('auth:api');

//Routes for showing the users 
Route::post('/user/show/{id}','UserController@show')->middleware('auth:api');
Route::get('/user/showUsers/{role}','UserController@showAll')->middleware('auth:api');

// Route for languages
Route::post('/language', 'LanguageController@add')->middleware('auth:api');
Route::post('/language/delete/{id}', 'LanguageController@delete')->middleware('auth:api');
Route::post('/language/edit/{id}', 'LanguageController@edit')->middleware('auth:api');
Route::get('/language/show', 'LanguageController@show')->middleware('auth:api');

// Route For Sets
Route::post('/set/{id}', 'SetController@add')->middleware('auth:api');
Route::post('/set/delete/{id}','SetController@delete')->middleware('auth:api');
Route::post('/set/edit/{id}','SetController@edit')->middleware('auth:api');
Route::get('/set/show', 'SetController@show')->middleware('auth:api');
Route::post('set/status/{id}','SetController@changeStatus')->middleware('auth:api');

// Route for reading question group
Route::post('/add-question-group/{id}','QuestionGroupController@store')->middleware('auth:api');
Route::post('/edit-question-group/{id}','QuestionGroupController@edit')->middleware('auth:api');
Route::post('/delete-question-group/{id}','QuestionGroupController@destroy')->middleware('auth:api');


//Routes for creating,viewing,editing and deleting questions options and answers based on question group
Route::post('/add-questions/{id}','ReadingQuestionController@store')->middleware('auth:api');
Route::get('/view-all-reading-questions/{id}','ReadingQuestionController@adminViewReading')->middleware('auth:api');
Route::get('/individual-reading-question/{id}','ReadingQuestionController@viewIndividual')->middleware('auth:api');
Route::post('/individual-reading-question-edit/{id}','ReadingQuestionController@editIndividual')->middleware('auth:api');

//Routes for student test
Route::get('/student-languages', 'StudentTestController@getLanguages')->middleware('auth:api');
Route::get('/student-sets/{id}', 'StudentTestController@getSets')->middleware('auth:api');
Route::get('/student-groups/{id}', 'StudentTestController@getGroups')->middleware('auth:api');
Route::get('/student-questions/{id}','StudentTestController@getAllQuestions')->middleware('auth:api');
//Route for submitting answers
Route::post('/submitted-answers/{id}', 'ReadingSubmittedAnswersController@submitReadingAnswers')->middleware('auth:api');
Route::get('/audio-stream/{path}','StudentTestController@getAudio');


// Route for results
Route::get('/get-details','StudentResultController@getAllResults')->middleware('auth:api');
Route::get('/individual-result/{id}','StudentResultController@individualResult')->middleware('auth:api');

// Route for listening question group
Route::post('/add-listening-group/{id}','ListeningQuestionGroupController@store')->middleware('auth:api');
Route::post('/delete-listening-group/{id}','ListeningQuestionGroupController@destroy')->middleware('auth:api');
Route::post('/edit-listening-group/{id}','ListeningQuestionGroupController@edit')->middleware('auth:api');

// Route for listening question
Route::post('/add-listening-question/{id}','ListeningQuestionController@store')->middleware('auth:api');
Route::get('/view-all-listening-questions/{id}','ListeningQuestionController@adminViewListening')->middleware('auth:api');
Route::get('/view-individual-listening-question/{id}','ListeningQuestionController@viewIndividual')->middleware('auth:api');
Route::post('/individual-listening-question-edit/{id}','ListeningQuestionController@editIndividual')->middleware('auth:api');

