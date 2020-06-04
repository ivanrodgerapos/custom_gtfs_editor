<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\AuditTrail;
use App\Helpers\AuditTrailHelper;
use App\Helpers\CommonHelper;
use Exception;

class RouteService
{
    public static function add_route($request) {
        $data = $request->input();

        try {
            $audit_trail = AuditTrail::instance();

            DB::beginTransaction();

            $audit_trail_data = AuditTrailHelper::format(1,'route','add', $data);

            $audit_trail->add($audit_trail_data);

            $result = Route::instance()->add($data);
            $data = $result ? "Success" : "Failed";
            
            DB::commit();
        }
        catch (Exception $e) {
            $data = $e->getMessage();
            DB::rollBack();
        }

        return CommonHelper::responseHelper($data);
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
                $data = CommonHelper::constant('Common.record_not_exist');
            }
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return CommonHelper::responseHelper($data);
    }

    public static function get_all_route () {
        try {
            $result = Route::instance()->get_all();
            $data = $result ? $result : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return CommonHelper::responseHelper($data);
    }

    public static function update_route_by_id ($request) {
        $data = $request->input();
        $has_req = $request->has('id');
        $id = isset($data['id']) ? $data['id'] : '0';

        try {
            $record_exists = self::check_route_exists($id);

            if ($record_exists) {
                $audit_trail = AuditTrail::instance();

                DB::beginTransaction();

                $old_data =  Route::instance()->get_by_id($id)[0];

                $result = Route::instance()->update_route_by_id($data);
                
                unset($data['id']);
                $audit_trail_data = AuditTrailHelper::format(1,'route','update', $data, $old_data);
                $audit_trail->add($audit_trail_data);

                $data = $result ? "Success" : "Failed";

                DB::commit();
            }
            else {
                $data = CommonHelper::constant('Common.record_not_exist');
            }
            
        }
        catch (Exception $e) {
            $data = $e->getMessage();
            DB::rollBack();
        }

        return CommonHelper::responseHelper($data);
    }

    private static function check_route_exists ($id) {
        return Route::instance()->check_if_route_exists($id);
    }
}