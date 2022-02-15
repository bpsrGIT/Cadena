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
        Schema::create('listings', function (Blueprint $table) {
            $table->id('listing_id')->unique();
            $table->timestamp('date_listed');
            $table->string('category');
            $table->string('sub_category');
            $table->string('brand');
            $table->string('product_model');
            $table->string('product_name');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('description');
            $table->boolean('is_active')->default(1);
            $table->integer('no_of_views');
            $table->integer('no_of_wishlist');
            $table->json('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
};
