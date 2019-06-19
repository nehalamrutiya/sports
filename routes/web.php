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
Route::resource('sports','HomeController');
Route::get('/home','HomeController@index')->name('home');

Route::resource('/sports','SportsTestController');
Route::get('/sports','SportsTestController@index')->name('sportstest');
Route::get('/sports/create','SportsTestController@create')->name('sportstest.create');
Route::post('/sports/store','SportsTestController@store')->name('sportstest.store');
Route::get('/sports/view/{id}','SportsTestController@view')->name('sportstest.view');
Route::delete('/sports/delete/{id}','SportsTestController@destroy')->name('sportstest.destroy');

Route::resource('/athlete','UserAssociateWithTestController');
Route::post('/athlete/store','UserAssociateWithTestController@store')->name('athlete.store');
Route::get('/athlete/edit/{id}','UserAssociateWithTestController@edit')->name('athlete.edit');
Route::post('/athlete/edit/{id}','UserAssociateWithTestController@update')->name('athlete.update');
Route::get('/athlete/delete/{id}','UserAssociateWithTestController@destroy')->name('athlete.destroy');
