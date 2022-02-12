<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMeta extends Model
{
    use HasFactory,
        HasUUID;

    protected $table = 'user_metas';

    // protected $fillable = [
    //     'user_id', 'fname', 'lname', 'uuid', 'gender', 'site',
    //     'bio', 'telegram', 'instagram', 'linkedin', 'twetter',
    // ];

    protected $guarded = [];

    public $timestamps = false;

    public function metaable()
    {
        return $this->morphTo();
    }}
