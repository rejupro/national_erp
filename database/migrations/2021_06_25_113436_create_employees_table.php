<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dept_id');
            $table->string('desg_id');
            $table->string('name');
            $table->string('fname');
            $table->string('mobile');
            $table->string('email');
            $table->string('mname');
            $table->string('phone');
            $table->string('nidno');
            $table->string('dob');
            $table->string('join_date');
            $table->string('salary');
            $table->string('status');
            $table->string('wbrid');
            $table->string('item');
            $table->string('address');
            $table->string('paddress');
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
