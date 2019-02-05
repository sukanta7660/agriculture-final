<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_transaction', function (Blueprint $table) {
            $table->increments('projectTransactionID');
            $table->integer('projectID')->unsigned()->index();
            $table->foreign('projectID')->references('projectID')->on('projects')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('project_transaction');
    }
}
