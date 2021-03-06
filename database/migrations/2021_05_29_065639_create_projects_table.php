<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedFloat('order');
            $table->string('main_keyword');
            $table->string('link')->nullable();
            $table->float('rate')->nullable();
            $table->char('type');
            $table->char('status')->default('n');
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('projects');
    }
}
