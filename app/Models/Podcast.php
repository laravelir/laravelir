<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Miladimos\Toolkit\Traits\HasAuthor;
use Miladimos\Toolkit\Traits\HasSlug;
use Miladimos\Toolkit\Traits\HasTags;
use Miladimos\Toolkit\Traits\HasUUID;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;

class Podcast extends Model
{
    use HasFactory,
        HasAuthor,
        HasSlug,
        HasUUID,
        RouteKeyNameUUID,
        HasTags;

    protected $table = 'podcasts';

    // protected $fillable = [];

    protected $guarded = [];

    // protected $casts = [
    //     'content_keywords' => 'array',
    //     'synonym_words' => 'array',
    // ];

    // public function tags()
    // {
    //     return $this->morphedByMany(Tag::class, 'taggable');
    // }
}
