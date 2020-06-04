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

// Agencies Controller
Route::get('Agency/fetch_by_id', 'Agencies@get_by_id');
Route::get('Agency/fetch_all', 'Agencies@get_all');
Route::post('Agency/create', 'Agencies@add');
Route::post('Agency/edit', 'Agencies@update_by_id');

// Calendars Controller
Route::get('Calendar/fetch_by_id', 'Calendars@get_by_id');
Route::get('Calendar/fetch_all', 'Calendars@get_all');
Route::post('Calendar/create', 'Calendars@add');
Route::post('Calendar/edit', 'Calendars@update_by_id');

// Frequencies Controller
Route::get('Frequency/fetch_by_id', 'Frequencies@get_by_id');
Route::get('Frequency/fetch_all', 'Frequencies@get_all');
Route::post('Frequency/create', 'Frequencies@add');
Route::post('Frequency/edit', 'Frequencies@update_by_id');

// Routes Controller
Route::get('Route/fetch_by_id', 'Routes@get_by_id');
Route::get('Route/fetch_all', 'Routes@get_all');
Route::post('Route/create', 'Routes@add');
Route::post('Route/edit', 'Routes@update_by_id');

// Shapes Controller
Route::get('Shape/fetch_by_id', 'Shapes@get_by_id');
Route::get('Shape/fetch_all', 'Shapes@get_all');
Route::post('Shape/create', 'Shapes@add');
Route::post('Shape/edit', 'Shapes@update_by_id');

// Stop Times Controller
Route::get('StopTime/fetch_by_id', 'StopTimes@get_by_id');
Route::get('StopTime/fetch_all', 'StopTimes@get_all');
Route::post('StopTime/create', 'StopTimes@add');
Route::post('StopTime/edit', 'StopTimes@update_by_id');
