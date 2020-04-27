<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    function add ($data) {
        $this->trip_id = $data['trip'];
        $this->start_time = $data['time_start'];
        $this->end_time = $data['time_end'];
        $this->headway_secs = $data['headway'];
        $this->exact_times = $data['exact_time'];

        return $this->save();
    }

    function get_by_id ($id) {
        return $this
                ->select('trip_id AS trip',
                        'start_time AS time_start',
                        'end_time AS time_end',
                        'headway_secs AS headway',
                        'exact_times AS exact_time')
                ->where('id', $id)
                ->orderBy('id', 'asc')
                ->take(1)
                ->get();
    }

    function get_all () {
        return $this
            ->select('trip_id AS trip',
                    'start_time AS time_start',
                    'end_time AS time_end',
                    'headway_secs AS headway',
                    'exact_times AS exact_time')
            ->get();
    }

    function update_frequency_by_id ($data) {
        return $this
            ->where('id', $data['id'])
            ->update(['trip_id' => $data['trip'],
                    'start_time' => $data['time_start'],
                    'end_time' => $data['time_end'],
                    'headway_secs' => $data['headway'],
                    'exact_times' => $data['exact_time']]);
    }

    function check_if_frequency_exists ($id) {
        return $this->where('id', $id)->exists();
    }

    public static function instance() {
        return new Frequency();
    }
}
