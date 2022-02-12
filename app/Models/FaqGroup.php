<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Model;

class FaqGroup extends Model
{
    use HasUUID,
        RouteKeyNameUUID;

    protected $table = 'faq_groups';

    // protected $fillable = ['title'];

    protected $guarded = [];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
