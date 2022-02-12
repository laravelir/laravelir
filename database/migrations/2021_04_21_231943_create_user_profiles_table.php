<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('user_id');
            $table->string('avatar_path')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('national_code')->unique()->nullable();
            $table->string('national_card_image')->nullable();
            $table->boolean('national_card_image_approved')->default(false);
            $table->string('address')->nullable();
            $table->string('bio')->nullable();
            // $table->enum('gender', collect(Gender::class))->default('0');
            $table->enum('gender', ['m', 'f'])->nullable();
            $table->string('site')->nullable();
            $table->string('telegram')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('user_profiles');
    }
}
