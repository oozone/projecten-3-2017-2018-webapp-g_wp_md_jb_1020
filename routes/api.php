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

Route::Resource('players', 'Api\PlayerController');
Route::Resource('teams', 'Api\TeamController');
Route::Resource('matches', 'Api\MatchController');
Route::Resource('divisions', 'Api\DivisionController');
Route::Resource('locations', 'Api\LocationController');
Route::Resource('goals', 'Api\GoalsController');
Route::Resource('penaltybooks', 'Api\PenaltyBookController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
