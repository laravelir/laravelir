<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->char('type');
            $table->string('title')->nullable();
            $table->text('description');
            $table->string('price');
            $table->string('dollar_price');
            $table->unsignedFloat('order');
            $table->string('header_color')->nullable();
            $table->string('price_discount')->nullable();
            $table->string('dollar_price_discount')->nullable();
            $table->boolean('vip')->default(false);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('packages');
    }
}
