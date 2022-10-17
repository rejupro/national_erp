<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyExpenseModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_expense_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_id');
            $table->date('date');
            $table->string('item_id');
            $table->string('stf_id')->nullable();
            $table->text('address');
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
        Schema::dropIfExists('daily_expense_models');
    }
}
