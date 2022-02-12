<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{

    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->unique();
            $table->morphs('paymentable');
            $table->string('resnumber');
            $table->unsignedBigInteger('amount');
            $table->char('currency');
            $table->char('type');
            $table->boolean('has_factor')->default(false);
            $table->boolean('payment')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
