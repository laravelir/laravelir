<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Miladimos\Toolkit\Traits\HasAuthor;
use Miladimos\Toolkit\Traits\HasComment;
use Miladimos\Toolkit\Traits\HasTags;
use Miladimos\Toolkit\Traits\HasUUID;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;

class Post extends Model
{
    use HasFactory,
        HasUUID,
        Sluggable,
        HasAuthor,
        RouteKeyNameUUID,
        HasTags,
        HasComment;

    protected $table = 'posts';

    // protected $fillable = [];

    protected $guarded = [];

    // protected $casts = [
    //     'content_keywords' => 'array',
    //     'synonym_words' => 'array',
    // ];

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
