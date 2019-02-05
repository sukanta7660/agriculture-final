<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeExpanseTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inexp_transaction', function (Blueprint $table) {
            $table->increments('inexpTransactionID');
            $table->integer('inexpCatID')->unsigned()->index();
            $table->foreign('inexpCatID')->references('inexpCatID')->on('inexp_cat')->onDelete('cascade')->onUpdate('No Action');
            $table->double('amountIN')->default(0);
            $table->double('amountOut')->default(0);
            $table->string('transactionType',3)->default('OUT');
            $table->string('descriptions')->nullable();
            $table->integer('projectID')->unsigned()->index();
            $table->foreign('projectID')->references('projectID')->on('projects')->onDelete('cascade')->onUpdate('No Action');
            $table->softDeletes();
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
        Schema::dropIfExists('inexp_transaction');
    }
}
