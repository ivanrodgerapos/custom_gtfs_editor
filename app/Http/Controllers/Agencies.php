<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AgencyService;

class Agencies extends Controller
{
    // Add
    function add (Request $request) {
        return AgencyService::add_agency($request);
    }

    // Get By Id
    function get_by_id (Request $request) {
        return AgencyService::get_agency_by_id($request);
    }

    // Get All
    function get_all () {
        return AgencyService::get_all_agency();
    }

    // Update
    function update_by_id(Request $request) {
        return AgencyService::update_agency_by_id($request);
    }

    // Delete
}
