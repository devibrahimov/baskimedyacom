<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBasketProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('basket_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('option_id');
            $table->json('additional_options') ;
            $table->tinyInteger('quantity');
            $table->tinyInteger('square_meter');
            $table->timestamps();
        });


        Schema::table('basket_products', function (Blueprint $table) {
            $table->foreign('basket_id')->references('id')->on('basket')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
         $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket_products');
    }
}
