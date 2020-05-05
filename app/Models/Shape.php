<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    function add ($data) {
        $this->shape_id = $data['shape'];
        $this->shape_dist_traveled = $data['distance_traveled'];
        $this->shape_pt_sequence = $data['point_sequence'];
        $this->shape_pt_lon = $data['point_longitude'];
        $this->shape_pt_lat = $data['point_latitude'];

        return $this->save();
    }

    function get_by_id ($id) {
        
        return $this
                ->select('shape_id AS shape',
                        'shape_dist_traveled AS distance_traveled',
                        'shape_pt_sequence AS point_sequence',
                        'shape_pt_lon AS point_longitude',
                        'shape_pt_lat AS point_latitude')
                ->where('id', $id)
                ->orderBy('id', 'asc')
                ->take(1)
                ->get();
    }

    function get_all () {
        return $this
            ->select('shape_id AS shape',
                    'shape_dist_traveled AS distance_traveled',
                    'shape_pt_sequence AS point_sequence',
                    'shape_pt_lon AS point_longitude',
                    'shape_pt_lat AS point_latitude')
            ->get();
    }

    function update_shape_by_id ($data) {
        return $this
            ->where('id', $data['id'])
            ->update(['shape_id' => $data['shape'],
                    'shape_dist_traveled' => $data['distance_traveled'],
                    'shape_pt_sequence' => $data['point_sequence'],
                    'shape_pt_lon' => $data['point_longitude'],
                    'shape_pt_lat' => $data['point_latitude']]);
    }

    function check_if_shape_exists ($id) {
        return $this->where('id', $id)->exists();
    }

    public static function instance() {
        return new Shape();
    }
}
