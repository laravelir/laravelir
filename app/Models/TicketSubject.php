<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TicketSubject extends Model
{
    use HasUUID,
        HasTranslations,
        RouteKeyNameUUID;

    protected $table = 'ticket_subjects';

    protected $fillable = ['title', 'active', 'uuid', 'created_at', 'updated_at'];

    public $timestamps = false;

    public $translatable = ['title'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
