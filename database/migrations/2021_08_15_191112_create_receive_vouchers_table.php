<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('voucher_no');
            $table->date('date');
            $table->unsignedBigInteger('project_id');
            $table->double('amount',8,2);
            $table->text('note')->nullable();
            $table->string('uid')->nullable();
            $table->string('bid')->nullable();
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
        Schema::dropIfExists('receive_vouchers');
    }
}
