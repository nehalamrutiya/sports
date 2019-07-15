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
Route::group(['middleware' => ['cors','auth:api']], function () {
    Route::get('me','API\UserController@getMe');
    Route::post('logout','API\UserController@logoutApi');
    Route::get('isCoach/{id}','API\UserAPIController@isCoach');
    
    Route::apiResource('sports','API\SportsTestAPIController');
    Route::get('sports','API\SportsTestAPIController@index');
    Route::post('addSportsTest','API\SportsTestAPIController@store');
});


Route::get('sportsTestType','API\SportsTestTypeAPIController@index');

Route::get('/sportsDetail/{id}','API\SportsTestDetailAPIController@view');
Route::delete('/deleteSportsTest/{id}','API\SportsTestAPIController@destroy');

Route::get('users','API\UserAPIController@index');

Route::post('addAthlete','API\AthleteAPIController@store');
Route::get('/getAthleteById/{id}','API\AthleteAPIController@edit');
Route::post('/editAthleteById/{id}','API\AthleteAPIController@update');
Route::delete('/deleteAthleteById/{id}','API\AthleteAPIController@destroy');
