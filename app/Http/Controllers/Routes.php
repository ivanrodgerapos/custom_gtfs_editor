<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RouteService;

class Routes extends Controller
{
    // Add
    function add (Request $request) {
        return RouteService::add_route($request);
    }

    // Get By Id
    function get_by_id (Request $request) {
        return RouteService::get_route_by_id($request);
    }

    // Get All
    function get_all () {
        return RouteService::get_all_route();
    }

    // Update
    function update_by_id(Request $request) {
        return RouteService::update_route_by_id($request);
    }
}
