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

Route::get('/cvs','CvController@index');
Route::get('/cvs/create','CvController@create');
Route::post('/cvs','CvController@store');
Route::get('/cvs/{user}/cvs','CvController@mycvs');
Route::get('/cvs/{cv}','CvController@show');
Route::get('cvs/{cv}/delete','CvController@destroy');
Route::get('cvs/{cv}/edit','CvController@edit');
Route::put('cvs/{cv}','CvController@update');

Route::get('/profile/{user}','HomeController@profile');
//Route::get('/profile/{user}','CvController@getexp');

Route::get('/profile/{user}/edit','UsersController@edit');
Route::put('/profile/{user}','UsersController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/java/{id}','CvController@getdata');
Route::get('/user/{id}','UsersController@getdata');
Route::post('/postexp','CvController@postexp');
Route::put('/editexp/{exp}','CvController@editexp');
Route::get('/deletexp/{id}','CvController@deletexp'); //this is not done yet !
Route::put('/editprofile/{id}','UsersController@editprofile');

Route::get('/javas', function() {
  return  view('vuejs');
});
