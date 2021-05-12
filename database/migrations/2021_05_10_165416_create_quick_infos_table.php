<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quick_infos', function (Blueprint $table) {
            $table->id();
            $table->text('info');
            $table->date('date');
            $table->tinyInteger('is_published')->default(0);
            $table->unsignedInteger('region_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('region_id')
                ->references('regionid')
                ->on('uz_regions')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quick_infos');
    }
}
