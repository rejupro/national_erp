<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawProductSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_product_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no');
            $table->string('supplier_id');
            $table->string('total_price');
            $table->string('dis_percen')->default('0');
            $table->string('dis_percen_amount')->default('0');
            $table->string('direct_dis')->default('0');
            $table->string('vat_percen')->default('0');
            $table->string('vat_percen_amount')->default('0');
            $table->string('tax_percen')->default('0');
            $table->string('tax_percen_amount')->default('0');
            $table->string('others')->default('0');
            $table->string('frac_dis')->default('0');
            $table->string('grand_total');
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
        Schema::dropIfExists('raw_product_sales');
    }
}
