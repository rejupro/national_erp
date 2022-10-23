<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawmaterialStockDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawmaterial_stock_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('material_id');
            $table->string('stock_invoice');
            $table->string('quantity');
            $table->string('price');
            $table->string('supplier');
            $table->string('dis_percen')->nullable();
            $table->string('dis_percen_amount')->nullable();
            $table->string('vat_percen')->nullable();
            $table->string('vat_percen_amount')->nullable();
            $table->string('tax_percen')->nullable();
            $table->string('tax_percen_amount')->nullable();
            $table->string('others')->nullable();
            $table->string('frac_dis')->nullable();
            $table->string('grand_total');
            $table->string('date');
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
        Schema::dropIfExists('rawmaterial_stock_details');
    }
}
