<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralExpTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gen_exp_transaction', function (Blueprint $table) {
            $table->increments('generalExpanseTransactionID');
            $table->integer('generalExpanseID')->unsigned()->index();
            $table->foreign('generalExpanseID')->references('generalExpanseID')->on('general_expanse')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('gen_exp_transaction');
    }
}
