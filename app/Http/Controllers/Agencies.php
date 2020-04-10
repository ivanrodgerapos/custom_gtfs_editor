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
        
        return CommonHelper::instance()->responseHelper($response);
    }

    // Get By Id
    function get_by_id (Request $request) {
        $response = AgencyService::get_agency_by_id($request);
        
        return CommonHelper::instance()->responseHelper($response);
    }

    // Get All

    // Update

    // Delete
}
