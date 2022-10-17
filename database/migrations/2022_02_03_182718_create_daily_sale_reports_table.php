<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailySaleReportsTable extends Migration
{
    /**
     * Run the migrations.
     *'company_name','contract_name',contract_email'contract_designation','contract_mobile','interested_product','contract_address','comments','employee_id','branch_id','contract_date','created_by'
     * @return void
     */
    public function up()
    {
        Schema::create('daily_sale_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('contract_name');
            $table->string('contract_email')->nullable();
            $table->string('contract_designation');
            $table->string('contract_mobile')->nullable();
            $table->longText('interested_product');
            $table->longText('contract_address');
            $table->longText('comments')->nullable();
            $table->string('employee_id');
            $table->string('branch_id');
            $table->string('contract_date');
            $table->string('created_by');
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
        Schema::dropIfExists('daily_sale_reports');
    }
}
