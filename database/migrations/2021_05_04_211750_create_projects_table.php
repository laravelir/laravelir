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
            $table->foreignId('freelancer_id')->nullable();
            $table->foreignId('language_id');
            $table->foreignId('business_id');
            $table->foreignId('product_id');
            $table->foreignId('category_id');
            $table->foreignId('quality_id')->nullable();
            $table->string('title');
            $table->unsignedTinyInteger('count')->default(1);
            $table->string('content_title')->nullable();
            $table->string('main_keyword');
            $table->json('synonym_words');
            $table->boolean('rasa_choice')->default(false);
            $table->string('attachment_file')->nullable();
            $table->string('price');
            $table->char('currency');
            $table->string('comment')->nullable();
            $table->string('rate')->nullable();
            $table->string('description');
            $table->char('tone');
            $table->char('format');
            $table->char('type');
            $table->char('type_of_do_project');
            $table->char('status')->default('n');
            $table->boolean('approved')->default(false);
            $table->boolean('admin_done')->default(false);
            $table->boolean('customer_done')->default(false);
            $table->timestamp('done_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('CASCADE');

            $table->foreign('freelancer_id')
                ->references('id')->on('freelancers')
                ->onDelete('CASCADE');

            $table->foreign('language_id')
                ->references('id')->on('languages')
                ->onDelete('CASCADE');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('CASCADE');

            // $table->foreign('business_infos')
            //     ->references('id')->on('categories')
            //     ->onDelete('CASCADE');
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
