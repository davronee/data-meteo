<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_regions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('weather_regionid')->unique()->nullable();
            $table->unsignedInteger('regionid')->unique()->nullable();
            $table->string('code')->nullable();
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
        Schema::dropIfExists('weather_regions');
    }
}
