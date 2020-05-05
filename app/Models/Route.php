<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    function add ($data) {
        $this->agency_id = $data['agency'];
        $this->route_id = $data['route'];
        $this->route_short_name = $data['short_name'];
        $this->route_long_name = $data['long_name'];
        $this->route_desc = $data['desc'];
        $this->route_type = $data['type'];
        $this->route_url = $data['url'];
        $this->route_color = $data['color'];
        $this->route_text_color = $data['text_color'];
        $this->route_branding_url = $data['branding_url'];

        return $this->save();
    }

    function get_by_id ($id) {
        
        return $this
                ->select('agency_id AS agency',
                        'route_id AS route',
                        'route_short_name AS short_name',
                        'route_long_name AS long_name',
                        'route_desc AS desc',
                        'route_type AS type',
                        'route_url AS url',
                        'route_color AS color',
                        'route_text_color AS text_color',
                        'route_branding_url AS branding_url')
                ->where('id', $id)
                ->orderBy('id', 'asc')
                ->take(1)
                ->get();
    }

    function get_all () {
        return $this
            ->select('agency_id AS agency',
                    'route_id AS route',
                    'route_short_name AS short_name',
                    'route_long_name AS long_name',
                    'route_desc AS desc',
                    'route_type AS type',
                    'route_url AS url',
                    'route_color AS color',
                    'route_text_color AS text_color',
                    'route_branding_url AS branding_url')
            ->get();
    }

    function update_route_by_id ($data) {
        return $this
            ->where('id', $data['id'])
            ->update(['agency_id' => $data['agency'],
                    'route_id' => $data['route'],
                    'route_short_name' => $data['short_name'],
                    'route_long_name' => $data['long_name'],
                    'route_desc' => $data['desc'],
                    'route_type' => $data['type'],
                    'route_url' => $data['url'],
                    'route_color' => $data['color'],
                    'route_text_color' => $data['text_color'],
                    'route_branding_url' => $data['branding_url']]);
    }

    function check_if_route_exists ($id) {
        return $this->where('id', $id)->exists();
    }

    public static function instance() {
        return new Route();
    }
}
