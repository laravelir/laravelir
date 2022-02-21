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
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('author_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('description')->unique();
            $table->string('file_url')->unique();
            $table->text('transcript');
            $table->unsignedBigInteger('view_count')->default(0);
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
        Schema::dropIfExists('podcasts');
    }
};
