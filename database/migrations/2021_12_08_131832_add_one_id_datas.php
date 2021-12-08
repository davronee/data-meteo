<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOneIdDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('valid')->nullable();
            $table->string('tem_adr')->nullable();
            $table->string('gd')->nullable();
            $table->string('per_adr')->nullable();
            $table->string('tin')->nullable();
            $table->string('pport_issue_date')->nullable();
            $table->string('sur_name')->nullable();
            $table->string('ctzn')->nullable();
            $table->string('first_name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('user_type')->nullable();
            $table->string('pport_expr_date')->nullable();
            $table->string('natn')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('pport_no')->nullable();
            $table->string('mid_name')->nullable();
            $table->string('mob_phone_no')->nullable();
            $table->string('pin')->nullable();
            $table->string('pport_issue_place')->nullable();
            $table->string('full_name')->nullable();
            $table->string('password')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['valid', 'tem_adr', 'gd', 'per_adr', 'tin',
                'pport_issue_date', 'sur_name', 'ctzn', 'first_name', 'user_id', 'birth_date',
                'user_type', 'pport_expr_date', 'natn', 'birth_place', 'pport_no', 'mid_name', 'mob_phone_no',
                'pin', 'pport_issue_place', 'full_name']);
        });
    }
}
