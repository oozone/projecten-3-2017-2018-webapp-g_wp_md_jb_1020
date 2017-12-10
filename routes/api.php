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

Route::put('/players/{id}/changenumber', 'Api\PlayerController@changePlayerNumber');
Route::get('/players/{id}/match/{matchId}', 'Api\PlayerController@showMatch');
Route::Resource('players', 'Api\PlayerController');


Route::get('/teams/{id}/allplayers', 'Api\TeamController@getAllPlayersFromRelatedTeams');
Route::Resource('teams', 'Api\TeamController');

Route::get('/matches/mailtester', 'Api\MatchController@mailtester');
Route::post('/matches/{id}/sign', 'Api\MatchController@signAndCloseMatch');
Route::put('/matches/{id}/starters', 'Api\MatchController@setStarters');
Route::put('/matches/{id}/cancel', 'Api\MatchController@cancelMatch');
Route::put('/matches/{id}/comment', 'Api\MatchController@addCommentary');
Route::put('/matches/{id}/start', 'Api\MatchController@startMatch');
Route::put('/matches/{id}/end', 'Api\MatchController@endMatch');
Route::get('/matches/{id}/pdf', 'Api\MatchController@generatePdf');

Route::get('/matches/active', 'Api\MatchController@activeMatches');

Route::Resource('matches', 'Api\MatchController');
Route::get('/divisions/{id}/topscorers', 'Api\DivisionController@topscorers');
Route::Resource('divisions', 'Api\DivisionController');
Route::Resource('locations', 'Api\LocationController');
Route::Resource('goals', 'Api\GoalController');
Route::Resource('penaltybooks', 'Api\PenaltyController');


Route::post('authenticate', 'Api\AuthenticateController@authenticate');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('jwt.auth')->group(function () {


});