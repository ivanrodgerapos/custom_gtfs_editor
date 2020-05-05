<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Route;
use Exception;

class RouteService
{
    public static function add_route($request) {
        $data = $request->input();

        try {
            $result = Route::instance()->add($data);
            $data = $result ? "Success" : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function get_route_by_id ($request) {
        $id = $request->input('id');

        try {
            $record_exists = self::check_route_exists($id);

            if ($record_exists) {
                $result = Route::instance()->get_by_id($id);
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

    public static function get_all_route () {
        try {
            $result = Route::instance()->get_all();
            $data = $result ? $result : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function update_route_by_id ($request) {
        $data = $request->input();
        $has_req = $request->has('id');
        $id = isset($data['id']) ? $data['id'] : '0';

        try {
            $record_exists = self::check_route_exists($id);

            if ($record_exists) {
                $result = Route::instance()->update_route_by_id($data);
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

    private static function check_route_exists ($id) {
        return Route::instance()->check_if_route_exists($id);
    }
}