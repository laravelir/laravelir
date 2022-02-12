<?php

namespace App\Models;

use App\Models\User;
use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory,
        HasUUID;

    protected $table = 'user_profiles';

    // protected $fillable = [
    //     'user_id', 'fname', 'lname', 'uuid', 'gender', 'site',
    //     'bio', 'telegram', 'instagram', 'linkedin', 'twetter',
    // ];

    protected $guarded = [];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
