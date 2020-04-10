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
            $state = Agency::instance()->add($data);
            if ($state) {
                $data = "Success";
            }
            else {
                $data = "Failed";
            }
        } 
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function get_agency_by_id ($request) {
        $data = $request->input();

        try {
            $result = Agency::instance()->get_by_id($request);
            $data = $result ? $result : "Failed";
        } 
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }
}