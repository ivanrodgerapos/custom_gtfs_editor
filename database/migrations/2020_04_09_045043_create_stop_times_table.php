<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStopTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stop_times', function (Blueprint $table) {
            $table->id();
            // trip_id
            $table->string('trip_id', 25);
            // shape_dist_traveled
            $table->double('shape_dist_traveled', 11, 8);
            // stop_sequence
            $table->integer('stop_sequence')->nullable();
            // drop_off_type
            $table->integer('drop_off_type')->nullable();
            // arrival_time
            $table->time('arrival_time');
            // pickup_type
            $table->integer('pickup_type')->nullable();
            // timepoint
            $table->time('timepoint')->nullable();
            // stop_headsign
            $table->string('stop_headsign', 25)->nullable();
            // departure_time
            $table->time('departure_time')->nullable();
            // stop_id
            $table->string('stop_id', 25)->nullable();
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
        Schema::dropIfExists('stop_times');
    }
}
