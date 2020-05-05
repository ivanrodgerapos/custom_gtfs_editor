<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Calendar;
use Exception;

class CalendarService 
{
    public static function add_calendar($request) {
        $data = $request->input();

        try {
            $result = Calendar::instance()->add($data);
            $data = $result ? "Success" : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function get_calendar_by_id ($request) {
        $id = $request->input('id');

        try {
            $record_exists = self::check_calendar_exists($id);

            if ($record_exists) {
                $result = Calendar::instance()->get_by_id($id);
                $data = $result ? $result : "Failed";
            }
            else {
                $data = "Record does not exist.";
            }
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function get_all_calendar () {
        try {
            $result = Calendar::instance()->get_all();
            $data = $result ? $result : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function update_calendar_by_id ($request) {
        $data = $request->input();
        $has_req = $request->has('id');
        $id = isset($data['id']) ? $data['id'] : '0';

        try {
            $record_exists = self::check_calendar_exists($id);

            if ($record_exists) {
                $result = Calendar::instance()->update_calendar_by_id($data);
                $data = $result ? "Success" : "Failed";
            }
            else {
                $data = "Record does not exist.";
            }
            
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    private static function check_calendar_exists ($id) {
        return Calendar::instance()->check_if_calendar_exists($id);
    }
}