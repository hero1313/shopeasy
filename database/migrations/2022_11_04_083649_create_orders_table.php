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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('name');
            $table->string('email');
            $table->integer('number');
            $table->integer('display')->default('2');
            $table->integer('bank_method');
            $table->integer('payment_method')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->default(1);
            $table->date('delivery_date')->nullable();
            $table->integer('currency')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('address')->nullable()->default(0);
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
        Schema::dropIfExists('orders');
    }
};
