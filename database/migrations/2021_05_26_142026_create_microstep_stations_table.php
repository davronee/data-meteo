<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrostepStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microstep_stations', function (Blueprint $table) {
            $table->id();
            $table->integer('stationid')->unique();
            $table->string('station_name');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedInteger('region_id')->nullable();
            $table->foreign('region_id')->references('regionid')->on('uz_regions');
            $table->double('l_vis')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('microstep_stations');
    }
}
