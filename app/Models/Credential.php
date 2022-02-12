<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    use HasUUID;

    protected $table = 'credentials';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
