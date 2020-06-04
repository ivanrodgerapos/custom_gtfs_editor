<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Shape;
use App\Models\AuditTrail;
use App\Helpers\AuditTrailHelper;
use App\Helpers\CommonHelper;
use Exception;

class ShapeService
{
    public static function add_shape($request) {
        $data = $request->input();

        try {
            $audit_trail = AuditTrail::instance();

            DB::beginTransaction();

            $audit_trail_data = AuditTrailHelper::format(1,'shape','add', $data);

            $audit_trail->add($audit_trail_data);

            $result = Shape::instance()->add($data);
            $data = $result ? "Success" : "Failed";
            
            DB::commit();
        }
        catch (Exception $e) {
            $data = $e->getMessage();
            DB::rollBack();
        }

        return CommonHelper::responseHelper($data);
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
                $data = CommonHelper::constant('Common.record_not_exist');
            }
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return CommonHelper::responseHelper($data);
    }

    public static function get_all_shape () {
        try {
            $result = Shape::instance()->get_all();
            $data = $result ? $result : "Failed";
        }
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return CommonHelper::responseHelper($data);
    }

    public static function update_shape_by_id ($request) {
        $data = $request->input();
        $has_req = $request->has('id');
        $id = isset($data['id']) ? $data['id'] : '0';

        try {
            $record_exists = self::check_shape_exists($id);

            if ($record_exists) {
                $audit_trail = AuditTrail::instance();

                DB::beginTransaction();

                $old_data =  Shape::instance()->get_by_id($id)[0];

                $result = Shape::instance()->update_shape_by_id($data);
                
                unset($data['id']);
                $audit_trail_data = AuditTrailHelper::format(1,'shape','update', $data, $old_data);
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

    private static function check_shape_exists ($id) {
        return Shape::instance()->check_if_shape_exists($id);
    }
}