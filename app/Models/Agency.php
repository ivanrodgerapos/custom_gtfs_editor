<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    function add ($data) {
        $this->agency_id = $data['id'];
        $this->agency_name = $data['name'];
        $this->agency_url = $data['url'];
        $this->agency_lang = $data['lang'];
        $this->agency_phone = $data['phone'];
        $this->agency_email = $data['email'];
        $this->agency_timezone = $data['timezone'];
        $this->agency_fare_url = $data['fare_url'];
        $this->agency_branding_url = $data['branding_url'];

        return $this->save();
    }

    function get_by_id ($data) {
        
        return Agency::where('id', $data['id'])
                ->orderBy('id', 'asc')
                ->take(1)
                ->get();
    }

    public static function instance() {
        return new Agency();
    }

}
