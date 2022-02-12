<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasUUID,
        RouteKeyNameUUID;

    protected $table = 'reports';

    // protected $fillable = [''];

    protected $guarded = [];
}
