<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('author_id');
            $table->foreignId('parent_id')->default(0);
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('body');
            $table->text('thumbnail');
            $table->text('images')->nullable();
            $table->string('attachments')->nullable();
            $table->boolean('pinned')->default(false);
            $table->boolean('published')->default(false);
            $table->dateTime('published_at')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->softDeletes();

            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideas');
    }
}
