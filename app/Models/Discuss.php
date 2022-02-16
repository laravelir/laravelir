<?php

namespace App\Models;

use App\Enums\DiscussStatusEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Miladimos\Toolkit\Traits\HasUUID;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Cviebrock\EloquentSluggable\Sluggable;

class Discuss extends Model
{
    use HasFactory,
        HasUUID,
        RouteKeyNameUUID,
        Sluggable,
        SoftDeletes;


    protected $table = 'discussions';

    // protected $fillable = [];

    protected $guarded = [];

    public function discussionable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->hasOne(Discuss::class, 'id', 'parent_id')->withDefault(['title' => '---']);
    }


    public function category()
    {
        return $this->hasOne(Category::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Discuss::class, 'parent_id', 'id');
    }

    public function tags()
    {
        return $this->morphedByMany(Tag::class, 'taggable');
    }

    public function hasTag($tagId)
    {
        return collect(in_array($tagId, $this->tags))->pluck('id')->toArray();
    }

    public function scopeSearch($query, $keywords)
    {

        $keywords = explode(' ', $keywords);
        foreach ($keywords as $keyword) {
            $query->whereHas('categories', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
                ->orWhere('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tags', 'LIKE', '%' . $keyword . '%');
        }
        return $query;
    }


    public function scopeFilter($query)
    {
        $category = request('category');
        if (isset($category) && trim($category) != '' && $category != 'all') {
            $query->whereHas('category', function ($query) use ($category) {
                $query->whereId($category);
            });
        }
        //
        //        $type = request('type');
        //        if(isset($type) && trim($type) != '') {
        //            if(in_array($type , ['vip' , 'cash' , 'free'])) {
        //                $query->whereType($type);
        //            }
        //        }


        if (request('order') == '1') {
            $query->oldest();
        } else {
            $query->latest();
        }

        return $query;
    }

    public function readTime()
    {
        $minutes = round(str_word_count($this->body()) / 200);

        return $minutes == 0 ? 1 : $minutes;
    }

    public function scopePopular(Builder $query): Builder
    {
        return $query->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->orderBy('submitted_at', 'desc');
    }

    public function excerpt(int $limit = 100): string
    {
        return Str::limit(strip_tags($this->body()), $limit);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->whereNull('done_at')->where('status', DiscussStatusEnum::PUBLISHED);
    }

    public function isDone(): bool
    {
        return !is_null($this->solution_reply_id);
    }
    public function path()
    {
        return "/discussions/$this->slug";
    }

    public function url()
    {
        return url($this->path());
    }

    public function isApproved()
    {
        return (bool)$this->approved;
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
