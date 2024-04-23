<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_weather', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->dateTime('datetime');
            $table->date('date');
            $table->float('temp');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->float('wind_speed');
            $table->float('wind_deg');
            $table->float('wind_gust');
            $table->boolean('is_rain')->default(false);
            $table->boolean('is_snow')->default(false);
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
        Schema::dropIfExists('open_weather');
    }
}
