<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('bname')->nullable();
            $table->string('dialog')->nullable();
            $table->string('bdialog')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('web')->nullable();
            $table->string('email');
            $table->string('tin')->nullable();
            $table->string('vat')->nullable();
            $table->string('address');
            $table->string('baddress')->nullable();
            $table->string('image');
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('companys');
    }
}
