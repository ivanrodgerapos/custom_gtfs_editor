<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use App\Http\Services\RouteService;

class Routes extends Controller
{
    // Add
    function add (Request $request) {
        $response = RouteService::add_route($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get By Id
    function get_by_id (Request $request) {
        $response = RouteService::get_route_by_id($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get All
    function get_all () {
        $response = RouteService::get_all_route();

        return CommonHelper::responseHelper($response);
    }

    // Update
    function update_by_id(Request $request) {
        $response = RouteService::update_route_by_id($request);

        return CommonHelper::responseHelper($response);
    }
}
