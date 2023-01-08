<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('ss_name');

            $table->string('address')->nullable();


            $table->string('contact')->nullable();
            $table->tinyInteger('status')->default(1);


            $table->unsignedBigInteger('client_group_id')->nullable();
            $table->foreign('client_group_id')
                ->references('id')
                ->on('client_groups')
                ->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('suppliers');
    }
}
