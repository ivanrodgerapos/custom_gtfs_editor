<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use App\Http\Services\CalendarService;

class Calendars extends Controller
{
    // Add
    function add (Request $request) {
        $response = CalendarService::add_calendar($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get By Id
    function get_by_id (Request $request) {
        $response = CalendarService::get_calendar_by_id($request);
        
        return CommonHelper::responseHelper($response);
    }

    // Get All
    function get_all () {
        $response = CalendarService::get_all_calendar();

        return CommonHelper::responseHelper($response);
    }

    // Update
    function update_by_id(Request $request) {
        $response = CalendarService::update_calendar_by_id($request);

        return CommonHelper::responseHelper($response);
    }
}
