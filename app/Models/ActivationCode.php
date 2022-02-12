<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{

    protected $table = 'activation_codes';

    // protected $fillable = ['code', 'expired_at', 'codeable_id', 'codeable_type'];

    protected $guarded = [];


    public function codeable()
    {
        return $this->morphTo();
    }
}
