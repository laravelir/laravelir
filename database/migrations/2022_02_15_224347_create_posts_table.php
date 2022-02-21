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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('admin_id')->nullable(); // who review and approved
            $table->foreignId('author_id');
            $table->foreignId('category_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('description', 300)->unique();
            $table->text('body');
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamp('approved_at')->nullable();
            $table->char('type')->nullable();
            $table->boolean('sponsored')->default(0);
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
