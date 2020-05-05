<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shapes', function (Blueprint $table) {
            $table->id();
            // shape_id
            $table->string('shape_id');
            // shape_dist_traveled
            $table->double('shape_dist_traveled', 11, 8);
            // shape_pt_sequence
            $table->integer('shape_pt_sequence');
            // shape_pt_lon
            $table->double('shape_pt_lon', 11, 8);
            // shape_pt_lat
            $table->double('shape_pt_lat', 11, 8);
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
        Schema::dropIfExists('shapes');
    }
}
