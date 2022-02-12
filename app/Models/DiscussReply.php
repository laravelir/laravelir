<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Miladimos\Toolkit\Traits\HasUUID;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;

class DiscussReply extends Model
{
    use HasFactory,
        HasUUID,
        RouteKeyNameUUID,
        Sluggable,
        SoftDeletes;


    protected $table = 'discussions';

    // protected $fillable = [];

    protected $guarded = [];

    // protected $casts = [

    // 'images' => 'array',

    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return Category::find($this->category_id);
    }

    public function hasTag($tagId)
    {
        //        return collect(in_array($tagId, $this->tags->pluck('id')))->toArray();
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

    public function path()
    {
        return "/articles/$this->slug";
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    // public function excerpt(int $limit = 100): string
    // {
    //     return Str::limit(strip_tags(md_to_html($this->body())), $limit);
    // }

    public function isApproved()
    {
        return (bool)$this->approved;
    }
}
