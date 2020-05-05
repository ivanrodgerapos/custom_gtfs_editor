<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            // route_id
            $table->string('route_id', 20);
            // trip_id
            $table->string('trip_id', 20);
            // trip_headsign
            $table->string('trip_headsign')->nullable();
            // trip_short_name
            $table->string('trip_short_name')->nullable();
            // direction_id
            $table->string('direction_id')->nullable();
            // block_id
            $table->string('block_id')->nullable();
            // shape_id
            $table->string('shape_id')->nullable();
            // bikes_allowed
            $table->string('bikes_allowed')->nullable();
            // wheelchair_accessible
            $table->string('wheelchair_accessible')->nullable();
            // service_id
            $table->string('service_id')->nullable();
            // timestamps
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
        Schema::dropIfExists('trips');
    }
}
