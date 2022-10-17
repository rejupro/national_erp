<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('voucher_no');
            $table->string('payment_source');
            $table->string('payment_to');
            $table->string('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
            $table->double('amount',8,2);
            $table->string('ref')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
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
        Schema::dropIfExists('payment_details');
    }
}
