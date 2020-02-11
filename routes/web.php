<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});


Route::get('/home', 'HomeController@index')->name('home');

/**
 * Routes for Quesationnaire
 */
Route::get('/questionnaires/create', 'QuestionnaireController@create')->name('questionnaire.create');
Route::post('/questionnaires', 'QuestionnaireController@store')->name('questionnaire.store');
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show')->name('questionnaire.show');

/**
 * Routes For Questionnaire Questions
 */
Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create')->name('question.create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store')->name('question.store');
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy')->name('question.destroy');

/**
 * Routes for Survey
 */
Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show')->name('survey.show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store')->name('survey.store');





