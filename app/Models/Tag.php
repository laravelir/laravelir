<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;

class Tag extends Model
{
    use HasFactory,
        HasUUID,
        Sluggable,
        RouteKeyNameUUID;

    protected $table = 'tags';

    // protected $fillable = ['title', 'active', 'uuid', 'slug'];

    protected $guarded = [];

    // protected static function booted()
    // {
    //     static::addGlobalScope(new ActiveScope());
    // }
    // Tag::withoutGlobalScope('active')->get();

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable', 'taggables');
    }

    public function podcasts()
    {
        return $this->morphedByMany(Podcast::class, 'taggable', 'taggables');
    }

    public function discussions()
    {
        return $this->morphedByMany(Discuss::class, 'taggable', 'taggables');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function path()
    {
        return "/tags/$this->uuid";
    }

    public function url()
    {
        return url($this->path());
    }

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
