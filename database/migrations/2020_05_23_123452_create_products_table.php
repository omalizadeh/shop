<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('barcode')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('price')->default(0);
            $table->decimal('avg_rate', 2, 1)->default(5.0);
            $table->string('slug');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}