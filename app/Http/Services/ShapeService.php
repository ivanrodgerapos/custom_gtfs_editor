<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Shape;
use Exception;

class ShapeService
{
    public static function add_shape($request) {
        $data = $request->input();

        try {
            $result = Shape::instance()->add($data);
            $data = $result ? "Success" : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function get_shape_by_id ($request) {
        $id = $request->input('id');

        try {
            $record_exists = self::check_shape_exists($id);

            if ($record_exists) {
                $result = Shape::instance()->get_by_id($id);
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

    public static function get_all_shape () {
        try {
            $result = Shape::instance()->get_all();
            $data = $result ? $result : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function update_shape_by_id ($request) {
        $data = $request->input();
        $has_req = $request->has('id');
        $id = isset($data['id']) ? $data['id'] : '0';

        try {
            $record_exists = self::check_shape_exists($id);

            if ($record_exists) {
                $result = Shape::instance()->update_shape_by_id($data);
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

    private static function check_shape_exists ($id) {
        return Shape::instance()->check_if_shape_exists($id);
    }
}