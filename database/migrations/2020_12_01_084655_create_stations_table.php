<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('stations');
    }
}
