<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivationCodesTable extends Migration
{
    public function up()
    {
        Schema::create('activation_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code',  6)->unique();
            $table->timestamp('expired_at')->nullable();
            $table->morphs('codeable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activation_codes');
    }
}
