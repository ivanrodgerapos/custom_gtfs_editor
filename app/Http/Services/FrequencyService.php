<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Frequency;
use Exception;

class FrequencyService
{
    public static function add_frequency($request) {
        $data = $request->input();

        try {
            $result = Frequency::instance()->add($data);
            $data = $result ? "Success" : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function get_frequency_by_id ($request) {
        $id = $request->input('id');

        try {
            $record_exists = self::check_frequency_exists($id);

            if ($record_exists) {
                $result = Frequency::instance()->get_by_id($id);
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

    public static function get_all_frequency () {
        try {
            $result = Frequency::instance()->get_all();
            $data = $result ? $result : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return $data;
    }

    public static function update_frequency_by_id ($request) {
        $data = $request->input();
        $has_req = $request->has('id');
        $id = isset($data['id']) ? $data['id'] : '0';

        try {
            $record_exists = self::check_frequency_exists($id);

            if ($record_exists) {
                $result = Frequency::instance()->update_frequency_by_id($data);
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

    private static function check_frequency_exists ($id) {
        return Frequency::instance()->check_if_frequency_exists($id);
    }
}