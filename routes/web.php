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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'WelcomeController@index');
//Route::get('login', [ 'as' => 'login', 'uses' => 'LoginController']);
//Route::resource('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController']);
//Route::get('/login', 'WelcomeController@index');
Route::Resource('players', 'PlayerController');
Route::Resource('teams', 'TeamController');
Route::Resource('matches', 'MatchController');
Route::Resource('divisions', 'DivisionController');
Route::Resource('locations', 'LocationController');

Auth::routes();

Route::prefix('admin')->namespace('Admin')->group(function () {

	Route::get('/teams/{id}/csv', 'TeamController@csv');
	Route::post('/teams/{id}/csvImport', 'TeamController@csvImport');

	// Controllers Within The "App\Http\Controllers\Admin" Namespace
	Route::resource('players', 'PlayerController');
	Route::resource('teams', 'TeamController');
	Route::resource('matches', 'MatchController');
	Route::resource('locations', 'LocationController');



});