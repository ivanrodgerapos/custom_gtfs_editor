<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->id();
            // stop_id
            $table->string('stop_id');
            // stop_code
            $table->string('stop_code');
            // stop_name
            $table->string('stop_name');
            // stop_desc
            $table->text('stop_desc')->nullable();
            // stop_lat
            $table->double('stop_lat', 11, 8);
            // stop_lon
            $table->double('stop_lon', 11, 8);
            // zone_id
            $table->string('zone_id')->nullable();
            // stop_url
            $table->string('stop_url')->nullable();
            // location_type
            $table->string('location_type')->nullable();
            // parent_station
            $table->string('parent_station')->nullable();
            // stop_timezone
            $table->string('stop_timezone', 15)->nullable();
            // wheelchair_boarding
            $table->string('wheelchair_boarding')->nullable();
            // timestapms
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stops');
    }
}
