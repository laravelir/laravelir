<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use RouteKeyNameUUID,
        HasUUID;

    protected $table = 'menus';

    protected $guarded = [];

    // protected $fillable = [''];

}
