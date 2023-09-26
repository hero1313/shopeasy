<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('sessionId')->nullable();
            $table->string('pay_id');
            $table->string('order_id');
            $table->integer('currency')->nullable();
            $table->unsignedDecimal('total', 8, 2)->default(0);
            $table->string('pay_method');
            $table->string('name')->nullable()->default(0);
            $table->string('email')->nullable()->default(0);
            $table->string('transaction_status')->default(0);
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
        Schema::dropIfExists('transactions');
    }
};
