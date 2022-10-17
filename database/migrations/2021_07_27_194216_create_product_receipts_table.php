<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pur_invoice');
            $table->string('order_no');
            $table->string('challan_no');
            $table->string('rcv_date');
            $table->string('note');
            $table->string('item_id')->nullable();
            $table->string('item_name')->nullable();
            $table->string('purchase_qty')->nullable();
            $table->string('rcv_qty')->nullable();
            $table->string('rest_qty')->nullable();
            $table->string('now_qty')->nullable();
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
        Schema::dropIfExists('product_receipts');
    }
}
