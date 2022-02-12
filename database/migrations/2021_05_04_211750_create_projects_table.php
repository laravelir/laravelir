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
            $table->foreignId('language_id');
            $table->foreignId('category_id');
            $table->string('title');
            $table->string('main_keyword');
            $table->string('comment')->nullable();
            $table->string('rate')->nullable();
            $table->string('description');
            $table->char('type');
            $table->char('status')->default('n');
            $table->boolean('approved')->default(false);
            $table->boolean('admin_done')->default(false);
            $table->timestamp('done_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('CASCADE');

            $table->foreign('language_id')
                ->references('id')->on('languages')
                ->onDelete('CASCADE');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('CASCADE');

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
