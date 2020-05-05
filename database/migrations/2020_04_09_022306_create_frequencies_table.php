<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequencies', function (Blueprint $table) {
            $table->id();
            // trip_id
            $table->string('trip_id', 15);
            // start_time
            $table->time('start_time');
            // end_time
            $table->time('end_time');
            // headway_secs
            $table->bigInteger('headway_secs');
            // exact_times
            $table->bigInteger('exact_times');
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
        Schema::dropIfExists('frequencies');
    }
}
