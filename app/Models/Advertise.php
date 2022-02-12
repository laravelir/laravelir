<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory,
        HasUUID,
        RouteKeyNameUUID;


    protected $table = 'advertises';

    // protected $fillable = ['user_id', 'code', 'expired_at', 'type'];

    protected $guarded = [];
}
