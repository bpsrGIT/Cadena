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
            $table->id('id')->unique();
            $table->string('user_type')->default('user');
            $table->boolean('is_admin')->default(0);
            $table->string('name');
            $table->string('company_name');
            $table->string('mobile_number')->unique();
            $table->string('landline_number')->unique();
            $table->string('street_address');
            $table->string('city_address');
            $table->string('provincial_address');
            $table->string('zip_code');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('purpose_for_biking');
            $table->string('comfortable_position');
            $table->string('three_months_objective');
            $table->json('my_wishlist');
            $table->json('my_listings');
            $table->rememberToken();
            $table->timestamp('member_since');
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
