<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AcquaintedUs extends Model
{
    use HasFactory,
        HasUUID,
        RouteKeyNameUUID;

    protected $table = 'acquainted_us';

    protected $guarded = [];

    // public $translatable = ['title'];

}
