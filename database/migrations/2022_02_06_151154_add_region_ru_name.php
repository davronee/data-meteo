<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegionRuName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weather_regions', function (Blueprint $table) {
            $table->string('name_ru')->nullable();
            $table->string('name_uz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weather_regions', function (Blueprint $table) {
            $table->dropColumn('name_ru');
            $table->dropColumn('name_uz');
        });
    }
}
