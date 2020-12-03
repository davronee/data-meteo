<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeteosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meteos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('_id')->nullable();
            $table->tinyInteger('city_id')->nullable();
            $table->dateTime('datetime')->nullable();
            $table->string('cloud_amount')->nullable();
            $table->float('air_t')->nullable();
            $table->string('meteors')->nullable();
            $table->string('weather_code')->nullable();
            $table->unsignedBigInteger('datetime_ms')->nullable();
            $table->tinyInteger('region_id')->nullable();
            $table->string('city_name')->nullable();
            $table->boolean('is_regional_center')->default(false);
            $table->decimal('latitude',10,8)->nullable();
            $table->decimal('longitude',11,8)->nullable();
            $table->tinyInteger('has_data')->nullable();
            $table->tinyInteger('has_climatic_data')->nullable();
            $table->tinyInteger('is_visible')->nullable();
            $table->string('title')->nullable();
            $table->string('time_of_day')->nullable();
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
        Schema::dropIfExists('meteos');
    }
}
