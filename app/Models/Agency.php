<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    //
    public function get_first() {
        return $this::where('id', 1);
    }
}
