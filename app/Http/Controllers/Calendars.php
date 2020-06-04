<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CalendarService;

class Calendars extends Controller
{
    // Add
    function add (Request $request) {
        return CalendarService::add_calendar($request);
    }

    // Get By Id
    function get_by_id (Request $request) {
        return CalendarService::get_calendar_by_id($request);
    }

    // Get All
    function get_all () {
        return CalendarService::get_all_calendar();
    }

    // Update
    function update_by_id(Request $request) {
        return CalendarService::update_calendar_by_id($request);
    }
}
