<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use App\Http\Services\ShapeService;

class Shapes extends Controller
{
    // Add
    function add (Request $request) {
        $response = ShapeService::add_shape($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get By Id
    function get_by_id (Request $request) {
        $response = ShapeService::get_shape_by_id($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get All
    function get_all () {
        $response = ShapeService::get_all_shape();

        return CommonHelper::responseHelper($response);
    }

    // Update
    function update_by_id(Request $request) {
        $response = ShapeService::update_shape_by_id($request);

        return CommonHelper::responseHelper($response);
    }
}
