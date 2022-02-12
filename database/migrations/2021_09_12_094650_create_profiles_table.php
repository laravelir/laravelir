<?php

use App\Enums\GenderEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->morphs('profileable');
            $table->foreignId('country_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('short_bio', 120)->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar_path')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('national_code')->unique()->nullable();
            $table->string('national_card_image')->nullable();
            $table->boolean('national_card_image_approved')->default(false);
            $table->string('acquaintedUs_id')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->char('gender')->default(GenderEnum::UNKNOWN);
            $table->string('site')->nullable();
            $table->string('github')->nullable();
            $table->string('gitlab')->nullable();
            $table->string('telegram')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('twitch')->nullable();
            $table->string('reddit')->nullable();
            $table->string('youtube')->nullable();
            $table->string('virgorl')->nullable();
            $table->string('atbox')->nullable();
            $table->string('thanks_message')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamps();

            // $table->foreign('country_id')
            //     ->references('id')->on('countries')
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
        Schema::dropIfExists('profiles');
    }
}
