<?php

namespace App\Models;

use App\Enum\PostTypeEnum;
use Miladimos\Toolkit\Traits\HasTags;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Miladimos\Toolkit\Traits\HasAuthor;
use Cviebrock\EloquentSluggable\Sluggable;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Miladimos\Toolkit\Traits\RouteKeyNameSlug;

class Post extends Model
{
    use HasFactory,
        HasUUID,
        Sluggable,
        HasAuthor,
        HasTags,
        RouteKeyNameSlug;

    protected $table = 'posts';

    // protected $fillable = [];

    protected $guarded = [];

    // protected $casts = [
    //     'content_keywords' => 'array',
    //     'synonym_words' => 'array',
    // ];

    public function category()
    {
        return Category::find($this->category_id);
    }

    public function url()
    {
        return url($this->path());
    }

    public function path()
    {
        return "/posts/{$this->slug}";
    }

    public function type()
    {
        switch ($this->type) {
            case PostTypeEnum::LEARNING:
                return 'آموزشی';
            case PostTypeEnum::REPORTAGE:
                return 'رپرتاژ';
            case PostTypeEnum::NEWS:
                return 'اخبار';
            case PostTypeEnum::PACKAGE:
                return 'معرفی پکیج';
            default:
                # code...
                break;
        }
    }

    public function typeColor()
    {
        switch ($this->type) {
            case PostTypeEnum::LEARNING:
                return 'outline';
            case PostTypeEnum::REPORTAGE:
                return 'outline';
            case PostTypeEnum::NEWS:
                return 'outline';
            case PostTypeEnum::PACKAGE:
                return 'outline';
            default:
                # code...
                break;
        }
    }

    public function thumbnail(): Attribute
    {
        return new Attribute(
            get: fn () => isset($this->thumbnail_path) ? $this->thumbnail_path : 'https://picsum.photos/536/354',
        );
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
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
