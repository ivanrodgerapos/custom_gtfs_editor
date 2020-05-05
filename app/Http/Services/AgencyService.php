<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Agency;
use Exception;

class AgencyService 
{
    public static function add_agency($request) {
        $data = $request->input();

        try {
            $result = Agency::instance()->add($data);
            $data = $result ? "Success" : "Failed";
        } 
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function get_agency_by_id ($request) {
        $id = $request->input('id');

        try {
            $record_exists = self::check_agency_exists($id);

            if ($record_exists) {
                $result = Agency::instance()->get_by_id($id);
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

    public static function get_all_agency () {
        try {
            $result = Agency::instance()->get_all();
            $data = $result ? $result : "Failed";
        } 
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function update_agency_by_id ($request) {
        $data = $request->input();
        $id = $data['id'];

        try {
            $record_exists = self::check_agency_exists($id);

            if ($record_exists) {
                $result = Agency::instance()->update_agency_by_id($data);
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

    private static function check_agency_exists ($id) {
        return Agency::instance()->check_if_agency_exists($id);
    }
}