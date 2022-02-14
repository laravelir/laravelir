<?php

use App\Enum\DiscussStatusEnum;
use App\Enum\DiscussTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->morphs('discussionable');
            $table->foreignId('parent_id')->default(0);
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('body');
            // $table->char('status')->default(DiscussStatusEnum::DRAFT);
            // $table->char('type')->default(DiscussTypeEnum::IDEAS);
            $table->boolean('pinned')->default(0);
            $table->unsignedInteger('view_count')->default(0);
            $table->timestamp('close_at')->nullable();
            $table->softDeletes();
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
}
