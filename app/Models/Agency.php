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

    function get_by_id ($id) {
        
        return $this
                ->select('agency_id AS id',
                        'agency_name AS name',
                        'agency_url AS url',
                        'agency_lang AS lang',
                        'agency_phone AS phone',
                        'agency_email AS email',
                        'agency_timezone AS timezone',
                        'agency_fare_url AS fare_url',
                        'agency_branding_url AS branding_url')
                ->where('id', $id)
                ->orderBy('id', 'asc')
                ->take(1)
                ->get();
    }

    function get_all  () {
        return $this
            ->select('agency_id AS id',
                    'agency_name AS name',
                    'agency_url AS url',
                    'agency_lang AS lang',
                    'agency_phone AS phone',
                    'agency_email AS email',
                    'agency_timezone AS timezone',
                    'agency_fare_url AS fare_url',
                    'agency_branding_url AS branding_url')
            ->get();
    }

    function update_agency_by_id ($data) {
        return $this
            ->where('id', $data['id'])
            ->update(['agency_id' => $data['agency'],
                    'agency_name' => $data['name'],
                    'agency_url' => $data['url'],
                    'agency_lang' => $data['lang'],
                    'agency_phone' => $data['phone'],
                    'agency_email' => $data['email'],
                    'agency_timezone' => $data['timezone'],
                    'agency_fare_url' => $data['fare_url'],
                    'agency_branding_url' => $data['branding_url']]);
    }

    function check_if_agency_exists ($id) {
        return $this->where('id', $id)->exists();
    }

    public static function instance() {
        return new Agency();
    }

}
