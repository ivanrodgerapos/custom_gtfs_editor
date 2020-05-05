<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            // agency_id
            $table->string('agency_id', 50);
            // route_id
            $table->string('route_id', 10);
            // route_short_name
            $table->string('route_short_name', 50);
            // route_long_name
            $table->string('route_long_name', 50);
            // route_desc
            $table->string('route_desc')->nullable();
            // route_type
            $table->bigInteger('route_type');
            // route_url
            $table->string('route_url')->nullable();
            // route_color
            $table->string('route_color', 25);
            // route_text_color
            $table->string('route_text_color', 25);
            // route_branding_url
            $table->string('route_branding_url')->nullable();
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
        Schema::dropIfExists('routes');
    }
}
