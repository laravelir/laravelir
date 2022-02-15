<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Miladimos\Toolkit\Traits\HasAuthor;
use Miladimos\Toolkit\Traits\HasUUID;

class Post extends Model
{
    use HasFactory, HasUUID, Sluggable, HasAuthor;
    protected $table = 'podcasts';

    // protected $fillable = [];

    protected $guarded = [];

    // protected $casts = [
    //     'content_keywords' => 'array',
    //     'synonym_words' => 'array',
    // ];

    public function tags()
    {
        return $this->morphedByMany(Tag::class, 'taggable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
