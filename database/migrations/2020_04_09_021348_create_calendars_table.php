<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            // service_id
            $table->string('service_id');
            // monday
            $table->integer('monday');
            // tuesday
            $table->integer('tuesday');
            // wednesday
            $table->integer('wednesday');
            // thursday
            $table->integer('thursday');
            // friday
            $table->integer('friday');
            // saturday
            $table->integer('saturday');
            // sunday
            $table->integer('sunday');
            // start_date
            $table->string('start_date', 25);
            // end_date
            $table->string('end_date', 25);
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
        Schema::dropIfExists('calendars');
    }
}
