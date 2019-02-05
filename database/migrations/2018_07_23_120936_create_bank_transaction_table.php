<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankbook', function (Blueprint $table) {
            $table->increments('bankbookID');
            $table->integer('bankID')->unsigned()->index();
            $table->foreign('bankID')->references('bankID')->on('banks')->onDelete('cascade')->onUpdate('No Action');
            $table->double('amountIN')->default(0);
            $table->double('amountOut')->default(0);
            $table->string('transactionType',3)->default('IN');
            $table->string('descriptions')->nullable();
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
        Schema::dropIfExists('bank_transaction');
    }
}
