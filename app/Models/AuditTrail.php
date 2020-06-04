<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    // Insert to Audit Trail
    function add ($data) {
        $this->user_id  = $data['user'];
        $this->module   = $data['module'];
        $this->action   = $data['action'];
        $this->url      = $data['action_url'];
        $this->old_data = $data['previous_data'];
        $this->new_data = $data['current_data'];

        return $this->save();
    }

    public static function instance() {
        return new AuditTrail();
    }
}
