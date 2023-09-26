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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('lastname')->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->integer('language')->nullable()->default('2');
            $table->integer('currency')->nullable()->default('2');
            $table->string('description')->nullable();
            $table->string('headline')->nullable();
            $table->string('slider', 2048)->nullable()->default('slider.png');


            $table->string('confidence-policy')->nullable();
            $table->string('return-policy')->nullable();
            $table->string('terms-condition')->nullable();
            $table->string('terms-delivery')->nullable();


            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();

            $table->string('tbc')->nullable();
            $table->string('tbc_key')->nullable();
            $table->string('tbc_secret')->nullable();
            $table->string('tbc_iban')->nullable();


            $table->string('stripe')->nullable();
            $table->string('stripe_key')->nullable();
            $table->string('stripe_secret')->nullable();

            $table->string('payze')->nullable();
            $table->string('payze_key')->nullable();
            $table->string('payze_secret')->nullable();
            $table->string('payze_iban')->nullable();
            $table->string('payze_iban_index')->nullable();


            $table->integer('sms_office')->nullable();
            $table->string('sms_name')->nullable();
            $table->string('sms_token')->nullable();

            $table->integer('messenger')->nullable();
            $table->string('messenger_script')->nullable();

            $table->integer('analytics')->nullable();
            $table->string('analytics_script')->nullable();
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('image', 2048)->nullable()->default('logo.png');
            $table->integer('promo')->nullable()->default('0');
            $table->integer('promo_code')->nullable();
            $table->integer('promo_percentage')->nullable();
            $table->integer('tip')->nullable()->default('0');
            $table->integer('gift')->nullable()->default('0');
            $table->integer('call_status')->nullable()->default('1');
            $table->integer('activity_status')->nullable()->default('1');
            $table->timestamp('last_login_time')->nullable();
            $table->string('last_login_ip')->nullable();

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
        Schema::dropIfExists('users');
    }
};
