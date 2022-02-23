<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;

class ContactUs extends Model
{
    use HasFactory,
        HasUUID,
        RouteKeyNameUUID;

    protected $table = 'contact_us';

    // protected $fillable = ['name', 'call', 'subject_id', 'body', 'uuid'];

    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(ContactSubject::class, 'subject_id');
    }
}
