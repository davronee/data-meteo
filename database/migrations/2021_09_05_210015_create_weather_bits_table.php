<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherBitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_bits', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->dateTime('datetime');
            $table->date('date');
            $table->float('min_temp');
            $table->float('max_temp');
            $table->float('wind_dir');
            $table->float('wind_spd');
            $table->string('wind_cdir');
            $table->boolean('precip')->default(false);
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
        Schema::dropIfExists('weather_bits');
    }
}
