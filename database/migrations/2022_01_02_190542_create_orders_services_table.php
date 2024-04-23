<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('region_id')
                ->references('regionid')
                ->on('uz_regions')
                ->onDelete('cascade');
            $table->foreign('service_id')
                ->references('id')
                ->on('services');
            $table->string('fio');
            $table->string('phone')->nullable();
            $table->string('tin')->nullable();
            $table->string('email')->nullable();
            $table->tinyText('user_type')->nullable();
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
        Schema::dropIfExists('orders_services');
    }
}
