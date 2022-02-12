<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AccountDeleteRequest extends Model
{
    use HasUUID,
        RouteKeyNameUUID;

    protected $table = 'account_delete_requests';

    protected $fillable = ['user_id', 'approved', 'approved_at', 'uuid', 'description'];

    public function deleteable()
    {
        return $this->morphTo();
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->whereNotNull('approved_at');
    }
}
