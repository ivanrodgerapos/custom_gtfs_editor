<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use App\Http\Services\AgencyService;

class Agencies extends Controller
{
    // Add
    function add (Request $request) {
        $response = AgencyService::add_agency($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get By Id
    function get_by_id (Request $request) {
        $response = AgencyService::get_agency_by_id($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get All
    function get_all () {
        $response = AgencyService::get_all_agency();

        return CommonHelper::responseHelper($response);
    }

    // Update
    function update_by_id(Request $request) {
        $response = AgencyService::update_agency_by_id($request);

        return CommonHelper::responseHelper($response);
    }

    // Delete
}
