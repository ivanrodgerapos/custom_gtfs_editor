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

<<<<<<< HEAD
Route::post('generate_stops', 'GTFSRoutesController@generate_stops');
=======
Route::get('get_first', 'GTFSRoutesController@get_from_model');

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

// Stop_times Controller
// TBD

// Stops Controller
// TBD

// Stop Times Controller
// TBD

// Stops Controller
Route::get('generate_stops', 'Stops@generate_stops');

// Trips Controller
// TBD
>>>>>>> eded9bf29a863087fd8ef6c6c15f1014fef7911f
