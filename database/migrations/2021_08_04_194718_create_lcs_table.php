<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lc_no');
            $table->string('pi_code');
            $table->string('ship_date');
            $table->string('exp_date');
            $table->string('b_name');
            $table->string('s_name');
            $table->string('local_bank')->nullable();
            $table->string('bene_bank')->nullable();
            $table->string('t_amount');
            $table->string('note')->nullable();
            $table->string('u_id')->nullable();
            $table->string('b_id')->nullable();
            $table->string('lc1')->nullable();
            $table->string('lc2')->nullable();
            $table->string('lc3')->nullable();


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
        Schema::dropIfExists('lcs');
    }
}
