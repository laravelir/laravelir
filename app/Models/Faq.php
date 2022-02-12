<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasUUID,
        RouteKeyNameUUID;

    protected $table = 'faqs';

    protected $fillable = ['question', 'answer', 'uuid', 'active','group_id'];

    protected $dates = ['deleted_at'];

    public function group()
    {
        return $this->belongsTo(FaqGroup::class);
    }

}
