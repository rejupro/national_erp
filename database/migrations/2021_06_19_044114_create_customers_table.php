<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('status', ['0', '1']);
            $table->integer('code');
            $table->string('c_name');
            $table->string('m_name');
            $table->string('nid');
            $table->string('c_num');
            $table->string('c_phone');
            $table->string('c_email');
            $table->string('address');
            $table->string('s_address');
            $table->integer('district_id');
            $table->integer('zone_id');
            $table->integer('grp_id');
            $table->string('credit');
            $table->string('ranking');
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
        Schema::dropIfExists('customers');
    }
}
