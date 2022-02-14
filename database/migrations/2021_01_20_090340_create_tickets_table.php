<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{

    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code')->unique();
            $table->foreignId('admin_id')->nullable();
            $table->foreignId('parent_id')->default(0);
            $table->foreignId('subject_id')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('attachment')->nullable();
            $table->morphs('ticketable');
            $table->char('status')->nullable();
            $table->char('priority')->nullable();
            $table->boolean('is_reply')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->boolean('done')->default(false);
            $table->timestamp('done_at')->nullable();
            $table->timestamps();

            $table->foreign('admin_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('subject_id')
                ->references('id')->on('ticket_subjects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
