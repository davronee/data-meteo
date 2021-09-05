<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccuweathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accuweathers', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->dateTime('datetime');
            $table->date('date');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->float('day_wind_speed')->nullable();
            $table->float('day_wind_deg')->nullable();
            $table->string('day_wind_localized')->nullable();
            $table->string('day_wind_gust')->nullable();
            $table->boolean('day_rain')->default(false);
            $table->float('night_wind_speed')->nullable();
            $table->float('night_wind_deg')->nullable();
            $table->string('night_wind_localized')->nullable();
            $table->string('night_wind_gust')->nullable();
            $table->boolean('night_rain')->default(false);
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
        Schema::dropIfExists('accuweathers');
    }
}
