<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FrequencyService;

class Frequencies extends Controller
{
    // Add
    function add (Request $request) {
        return FrequencyService::add_frequency($request);
    }

    // Get By Id
    function get_by_id (Request $request) {
        return FrequencyService::get_frequency_by_id($request);
    }

    // Get All
    function get_all () {
        return FrequencyService::get_all_frequency();
    }

    // Update
    function update_by_id(Request $request) {
        return FrequencyService::update_frequency_by_id($request);
    }
}