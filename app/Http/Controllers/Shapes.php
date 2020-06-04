<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ShapeService;

class Shapes extends Controller
{
    // Add
    function add (Request $request) {
        return ShapeService::add_shape($request);
    }

    // Get By Id
    function get_by_id (Request $request) {
        return ShapeService::get_shape_by_id($request);
    }

    // Get All
    function get_all () {
        return ShapeService::get_all_shape();
    }

    // Update
    function update_by_id(Request $request) {
        return ShapeService::update_shape_by_id($request);
    }
}
