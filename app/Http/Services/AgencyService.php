<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\AuditTrail;
use App\Helpers\AuditTrailHelper;
use App\Helpers\CommonHelper;
use Exception;

class AgencyService 
{
    public static function add_agency ($request) {
        $data = $request->input();

        try {
            $audit_trail = AuditTrail::instance();

            DB::beginTransaction();

            $audit_trail_data = AuditTrailHelper::format(1,'agency','add', $data);

            $audit_trail->add($audit_trail_data);

            $result = Agency::instance()->add($data);
            $data = $result ? "Success" : "Failed";

            DB::commit();
        } 
        catch (Exception $e) {
            $data = $e->getMessage();
            DB::rollBack();
        }
        
        return CommonHelper::responseHelper($data);
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
                $data = CommonHelper::constant('Common.record_not_exist');
            }
        } 
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return CommonHelper::responseHelper($data);
    }

    public static function get_all_agency () {
        try {
            $result = Agency::instance()->get_all();
            $data = $result ? $result : "Failed";
        } 
        catch (Exception $e) {
            $data = $e->getMessage();
        }

        return CommonHelper::responseHelper($data);
    }

    public static function update_agency_by_id ($request) {
        $data = $request->input();
        $id = $data['id'];

        try {
            $record_exists = self::check_agency_exists($id);

            if ($record_exists) {
                $audit_trail = AuditTrail::instance();

                DB::beginTransaction();

                $old_data =  Agency::instance()->get_by_id($id)[0];

                $result = Agency::instance()->update_agency_by_id($data);

                unset($data['id']);
                $audit_trail_data = AuditTrailHelper::format(1,'agency','update', $data, $old_data);
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

    private static function check_agency_exists ($id) {
        return Agency::instance()->check_if_agency_exists($id);
    }
}