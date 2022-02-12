<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasUUID,
        RouteKeyNameUUID;

    protected $fillable = ['name', 'description', 'uuid', 'guard_name'];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
