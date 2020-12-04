<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegionForeinKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meteos', function (Blueprint $table) {
            $table->foreign('city_id')
                ->references('weather_regionid')->on('weather_regions')
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
            $table->dropForeign('meteos_city_id_foreign');
        });

    }
}
