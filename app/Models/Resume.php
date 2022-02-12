<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasUUID,
        RouteKeyNameUUID;

    //    protected $fillable = ['title', 'position', 'organization', 'start_date', 'end_date'];

    protected $table = 'resumes';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
