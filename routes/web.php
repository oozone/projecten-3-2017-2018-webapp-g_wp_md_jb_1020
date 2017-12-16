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

// Main index page
Route::get('/', 'WelcomeController@index');

// Open resource routes
Route::Resource('players', 'PlayerController');
Route::Resource('teams', 'TeamController');
Route::Resource('matches', 'MatchController');
Route::Resource('divisions', 'DivisionController');
Route::Resource('locations', 'LocationController');

// Login & register
Auth::routes();

// Admin-section
Route::middleware('auth')->prefix('admin')->namespace('Admin')->group(function () {

	Route::get('/teams/{id}/related', 'TeamController@relatedTeams');
	Route::put('/teams/{id}/related', 'TeamController@updateRelatedTeams');

	Route::get('/teams/{id}/csv', 'TeamController@csv');
	Route::post('/teams/{id}/csvImport', 'TeamController@csvImport');

	Route::get('/matches/finasheets', 'MatchController@finasheets');

	// Controllers Within The "App\Http\Controllers\Admin" Namespace
	Route::resource('players', 'PlayerController');
	Route::resource('teams', 'TeamController');
	Route::resource('matches', 'MatchController');
	Route::resource('locations', 'LocationController');
	Route::resource('scoreboard', 'ScoreboardController');
	Route::get('/', 'DashboardController@index');

});