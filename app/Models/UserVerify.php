<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    use HasUUID;

    protected $table = 'user_verifies';

    protected $fillable = [
        'uuid', 'user_id', 'token', 'email',
        'phone', 'expired_at', 'created_at',
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::creating(function ($item) {
            $item->created_at = now();
            $item->expired_at = now()->addMinutes(5);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
