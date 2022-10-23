<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDeliverysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_deliverys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_invoice');
            $table->string('order_no');
            $table->string('challan_no');
            $table->string('deli_date');
            $table->string('note');
            $table->string('item_id')->nullable();
            $table->string('item_name')->nullable();
            $table->string('sales_qty')->nullable();
            $table->string('deli_qty')->nullable();
            $table->string('rest_qty')->nullable();
            $table->string('now_qty')->nullable();
            $table->string('u_id')->nullable();
            $table->string('b_id')->nullable();
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
        Schema::dropIfExists('product_deliverys');
    }
}
