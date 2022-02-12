<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;

class Role extends \Spatie\Permission\Models\Role
{
    use HasUUID,
        RouteKeyNameUUID;

    protected $fillable = ['name', 'fa_name', 'description', 'uuid', 'guard_name'];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
