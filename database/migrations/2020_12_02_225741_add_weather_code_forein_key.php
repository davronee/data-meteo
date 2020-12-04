<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWeatherCodeForeinKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meteos', function (Blueprint $table) {
            $table->foreign('weather_code')
                ->references('code')->on('weather_codes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meteos', function (Blueprint $table) {
            $table->dropForeign('meteos_weather_code_foreign');
        });
    }
}
