<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    function add ($data) {
        $this->service_id = $data['service'];
        $this->monday = $data['mon'];
        $this->tuesday = $data['tue'];
        $this->wednesday = $data['wed'];
        $this->thursday = $data['thu'];
        $this->friday = $data['fri'];
        $this->saturday = $data['sat'];
        $this->sunday = $data['sun'];
        $this->start_date = $data['date_start'];
        $this->end_date = $data['date_end'];

        return $this->save();
    }

    function get_by_id ($id) {
        
        return $this
                ->select('service_id AS service',
                        'monday AS mon',
                        'tuesday AS tue',
                        'wednesday AS wed',
                        'thursday AS thu',
                        'friday AS fri',
                        'saturday AS sat',
                        'sunday AS sun',
                        'start_date AS date_start',
                        'end_date AS date_end')
                ->where('id', $id)
                ->orderBy('id', 'asc')
                ->take(1)
                ->get();
    }

    function get_all () {
        return $this
            ->select('service_id AS service',
                    'monday AS mon',
                    'tuesday AS tue',
                    'wednesday AS wed',
                    'thursday AS thu',
                    'friday AS fri',
                    'saturday AS sat',
                    'sunday AS sun',
                    'start_date AS date_start',
                    'end_date AS date_end')
            ->get();
    }

    function update_calendar_by_id ($data) {
        return $this
            ->where('id', $data['id'])
            ->update(['service_id' => $data['service'],
                    'monday' => $data['mon'],
                    'tuesday' => $data['tue'],
                    'wednesday' => $data['wed'],
                    'thursday' => $data['thu'],
                    'friday' => $data['fri'],
                    'saturday' => $data['sat'],
                    'sunday' => $data['sun'],
                    'start_date' => $data['date_start'],
                    'end_date' => $data['date_end']]);
    }

    function check_if_calendar_exists ($id) {
        return $this->where('id', $id)->exists();
    }

    public static function instance() {
        return new Calendar();
    }
}
