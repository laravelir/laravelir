<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('portfolio_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id');
            $table->unsignedBigInteger('skill_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_skills');
    }
}
