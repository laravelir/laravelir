<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory,
        HasUUID;

    protected $table = 'contact_us';

    // protected $fillable = ['name', 'call', 'subject_id', 'body'];

    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(ContactSubject::class, 'subject_id');
    }
}
