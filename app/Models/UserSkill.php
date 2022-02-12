<?php

namespace App\Models;

use App\Models\User;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasUUID;

    protected $table = 'user_skills';

    // protected $fillable = ['',''];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
