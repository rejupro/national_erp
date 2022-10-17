<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('status', ['0', '1']);
            $table->integer('code');
            $table->string('c_name');
            $table->string('c_num');
            $table->string('c_phone');
            $table->integer('under_id');
            $table->string('c_email');
            $table->integer('credit_limit');
            $table->integer('cgrp_id');
            $table->string('ranking');
            $table->string('address');
            $table->string('f_address');
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
        Schema::dropIfExists('suppliers');
    }
}
