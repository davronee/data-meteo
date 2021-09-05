<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUzHydrometsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uz_hydromets', function (Blueprint $table) {
            $table->id();
            $table->string('service_id');
            $table->string('region');
            $table->dateTime('datetime');
            $table->date('date');
            $table->float('air_t_min');
            $table->float('air_t_max');
            $table->float('wind_speed_min');
            $table->float('wind_speed_max');
            $table->float('wind_direction');
            $table->string('day_part');
            $table->boolean('precipitation')->default(false);
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
        Schema::dropIfExists('uz_hydromets');
    }
}
