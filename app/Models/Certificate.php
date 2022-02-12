<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Traits\RouteKeyNameUUID;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Certificate extends Model
{
    use HasUUID,
        RouteKeyNameUUID;


    protected $table = 'certificates';

    // protected $fillable = [''];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
