<?php

use App\Enum\GenderEnum;
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
            $table->foreignId('user_id');
            $table->foreignId('country_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('short_bio', 120)->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar_path')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('province')->nullable();
            $table->string('national_code')->unique()->nullable();
            $table->char('gender')->default(GenderEnum::UNKNOWN);
            $table->string('twitch')->nullable();
            $table->string('reddit')->nullable();
            $table->string('youtube')->nullable();
            $table->string('atbox')->nullable();
            $table->string('site')->nullable();
            $table->string('telegram')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->string('gitlab')->nullable();
            $table->string('virgol')->nullable();
            $table->string('resume_link')->nullable();
            $table->string('resume_file')->nullable();
            $table->string('acquaintedUs_id')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
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
        Schema::dropIfExists('profiles');
    }
}
