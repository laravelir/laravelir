<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory,
        HasUUID,
        HasTranslations;

    protected $table = 'countries';

    protected $fillable = ['title', 'flag', 'uuid'];

    public $translatable = ['title'];
}
