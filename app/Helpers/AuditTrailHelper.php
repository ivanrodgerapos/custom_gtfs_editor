<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Config;

class AuditTrailHelper
{
    public static function format ($user_id, $module, $action, $current_data, $prev_data = null, $action_url = null)
    {
        $prev_data = $prev_data != null ? json_encode($prev_data) : '';

        $audit_trail_data = [
            'user' => $user_id,
            'module' => self::get_module($module),
            'action' => self::get_action($action),
            'action_url' => $action_url,
            'previous_data' => $prev_data,
            'current_data' => json_encode($current_data)
        ];

        return $audit_trail_data;
    }

    public static function get_module ($module_name) {
        return Config::get('constants.AuditTrail.module_names.'.$module_name);
    }

    public static function get_action ($action) {
        return Config::get('constants.AuditTrail.actions.'.$action);
    }

}