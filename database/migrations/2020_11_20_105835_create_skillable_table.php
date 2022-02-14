<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillableTable extends Migration
{
    public function up()
    {
        Schema::create('skillables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skill_id');
            $table->morphs('skillable');
            $table->unique(['skill_id', 'skillable_id', 'skillable_type'], 'skillables_ids_type_unique');
            $table->timestamps();

            $table->foreign('skill_id')
                ->references('id')->on('skills')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('skillables');
    }
}
