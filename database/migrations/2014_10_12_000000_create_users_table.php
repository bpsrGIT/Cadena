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
            $table->string('company_name')->nullable();
            $table->string('mobile_number')->nullable()->unique();
            $table->string('landline_number')->nullable()->unique();
            $table->string('street_address')->nullable();
            $table->string('city_address')->nullable();
            $table->string('provincial_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('purpose_for_biking')->nullable();
            $table->string('comfortable_position')->nullable();
            $table->string('three_months_objective')->nullable();
            $table->json('my_wishlist')->nullable();
            $table->json('compare_items')->nullable();
            $table->json('my_listings')->nullable();
            $table->json('registered_dealers')->nullable();
            $table->timestamp('member_since')->useCurrent();
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
