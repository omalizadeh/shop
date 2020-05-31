<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeProductCombinationTable extends Migration
{
    public function up()
    {
        Schema::create('attribute_product_combination', function (Blueprint $table) {
            $table->unsignedBigInteger('attribute_product_id');
            $table->unsignedBigInteger('attribute_id');

            $table->foreign('attribute_product_id')->references('id')->on('attribute_product')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attribute_product_combination');
    }
}
