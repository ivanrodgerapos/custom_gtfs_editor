<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            
            $table->id();
            // agency_id
            $table->string('agency_id', 50);
            // agency_name
            $table->string('agency_name', 50);
            // agency_url 
            $table->string('agency_url')->nullable();
            // agency_lang
            $table->string('agency_lang', 25)->nullable();
            // agency_phone
            $table->string('agency_phone', 50)->nullable();
            // agency_email
            $table->string('agency_email', 50)->nullable();
            // agency_timezone
            $table->string('agency_timezone', 25)->nullable();
            // agency_fare_url
            $table->string('agency_fare_url')->nullable();
            // agency_branding_url
            $table->string('agency_branding_url')->nullable();
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
        Schema::dropIfExists('agencies');
    }
}
