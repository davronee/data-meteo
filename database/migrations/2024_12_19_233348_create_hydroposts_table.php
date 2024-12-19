<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHydropostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hydroposts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('latitude', 10, 6); // Latitude in WGS84 format
            $table->decimal('longitude', 10, 6); // Longitude in WGS84 format

            $table->unsignedInteger('region_id');
            $table->unsignedInteger('district_id')->nullable();

            $table->foreign('region_id')->references('regionid')->on('uz_regions');
            $table->foreign('district_id')->references('areaid')->on('uz_districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hydroposts');
    }
}
