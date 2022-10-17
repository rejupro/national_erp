<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sale_track');
            $table->string('item_id');
            $table->string('item_name');
            $table->string('cost');
            $table->string('quantity');
            $table->string('price');
            $table->string('company_name');
            $table->string('supplier_id');
            $table->string('supplier_name');
            $table->string('color')->nullable();
            $table->string('total')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('vat')->nullable();
            $table->string('vat_amount')->nullable();
            $table->string('tax')->nullable();
            $table->string('tax_amount')->nullable();
            $table->string('ait')->nullable();
            $table->string('ait_amount')->nullable();
            $table->string('other_amount')->nullable();
            $table->string('speed_money_amount')->nullable();
            $table->string('freight_amount')->nullable();
            $table->string('fraction_discount_amount')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('created_by');
            $table->string('cookie_id');
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
        Schema::dropIfExists('sales_details');
    }
}
