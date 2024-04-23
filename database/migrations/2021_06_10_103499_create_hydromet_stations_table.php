<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHydrometStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hydromet_stations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('code', 100);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedInteger('region_id');
            $table->tinyinteger('is_active')->default(1);
            $table->timestamps();

            $table->foreign('region_id')
                ->references('regionid')
                ->on('uz_regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hydromet_stations');
    }
}
