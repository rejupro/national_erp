<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnRequisitionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_requisition_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rereq_id');
            $table->string('requisition_item')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('return_requisition_details');
    }
}
