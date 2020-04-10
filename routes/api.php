<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('generate_stops', 'GTFSRoutesController@generate_stops');
Route::get('get_first', 'GTFSRoutesController@get_from_model');

// Agencies Controller
Route::get('Agency/get_by_id', 'Agencies@get_by_id');
Route::post('Agency/add_agency', 'Agencies@add');