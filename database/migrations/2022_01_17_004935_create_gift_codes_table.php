<?php

use App\Enum\CurrencyEnum;
use App\Enum\GiftCodeTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_codes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->unique();
            $table->string('title')->unique();
            $table->string('code')->unique();
            $table->string('value');
            $table->char('currency')->default(CurrencyEnum::TOMAN);
            // $table->char('type')->default(GiftCodeTypeEnum::FOR_USER);
            $table->unsignedInteger('count_use')->default(0);
            $table->unsignedInteger('count_use_user')->default(1)->description('for each user');
            $table->unsignedInteger('used_count')->default(0);
            $table->timestamp('expired_at')->nullable();
            $table->boolean('expired')->nullable();
            $table->timestamps();
        });

        Schema::create('giftcodeables', function (Blueprint $table) {
            $table->foreignId('giftcode_id')
                ->references('id')->on('gift_codes')
                ->cascadeOnDelete();

            $table->morphs('giftcodeable');
        });

        Schema::create('giftcode_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('giftcode_id');
            $table->morphs('giftcodeable');
            $table->unsignedTinyInteger('used_count')->default(0);
            $table->timestamp('created_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gift_codes');
    }
}
