<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use App\Http\Services\FrequencyService;

class Frequencies extends Controller
{
    // Add
    function add (Request $request) {
        $response = FrequencyService::add_frequency($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get By Id
    function get_by_id (Request $request) {
        $response = FrequencyService::get_frequency_by_id($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get All
    function get_all () {
        $response = FrequencyService::get_all_frequency();

        return CommonHelper::responseHelper($response);
    }

    // Update
    function update_by_id(Request $request) {
        $response = FrequencyService::update_frequency_by_id($request);

        return CommonHelper::responseHelper($response);
    }
}