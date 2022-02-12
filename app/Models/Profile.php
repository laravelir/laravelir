<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Miladimos\Toolkit\Traits\HasUUID;

class Profile extends Model
{
    use HasUUID;

    protected $table = 'profiles';

    // protected $fillable = ['fname', 'uuid', 'lname', 'user_id'];
    protected $guarded = [];

    public function profileable()
    {
        return $this->morphTo();
    }
}
