<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    use HasFactory,
        RouteKeyNameUUID,
        HasUUID;

    protected $table = 'backups';

    // protected $fillable = [''];

    protected $guarded = [];
}
