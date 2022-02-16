<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory,
        HasUUID;

    protected $table = 'tags';

    protected $fillable = ['name', 'active', 'uuid'];

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

    // public function scopeActive($query)
    // {
    //     return $query->where('active', 1)
    //                  ->where('status', 'published')
    //                  ->whereNull('deleted_at');
    // }

    public function path()
    {
        return "/tags/$this->uuid";
    }

}
