<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanktransDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banktrans_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trans_no');
            $table->string('deposit_from');
            $table->string('deposit_to');
            $table->string('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
            $table->double('amount',8,2);
            $table->string('ref')->nullable();
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
        Schema::dropIfExists('banktrans_details');
    }
}
