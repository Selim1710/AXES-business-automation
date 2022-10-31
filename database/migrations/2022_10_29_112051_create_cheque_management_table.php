<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequeManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_management', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->date('date');
            $table->string('tran_no');
            $table->integer('ac_number');
            $table->string('note')->nullable();
            $table->integer('amount');
            $table->string('cheque_no')->nullable();
            $table->string('cq_date')->nullable();
            $table->string('refference');
            $table->string('client');
            $table->string('cheque_bank');
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
        Schema::dropIfExists('cheque_management');
    }
}
