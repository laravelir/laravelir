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
            $table->uuid('uuid')->unique();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('language_id')->nullable();
            $table->string('title')->nullable();
            $table->string('order')->unique()->nullable();
            $table->string('description')->nullable();
            $table->string('price');
            $table->string('dollar_price');
            $table->char('type');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id')->onDelete('CASCADE');
            $table->foreign('language_id')->on('languages')->references('id')->onDelete('CASCADE');
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
