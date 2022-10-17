<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalVoucherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_voucher_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('journal_voucher_id');
            $table->unsignedBigInteger('debit_sub_group_id');
            $table->unsignedBigInteger('debit_ledger_id');
            $table->double('debit_amount',8,2);
            $table->double('credit_amount',8,2);
            $table->unsignedBigInteger('credit_ledger_id');
            $table->unsignedBigInteger('credit_sub_group_id');
            $table->string('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
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
        Schema::dropIfExists('journal_voucher_details');
    }
}
