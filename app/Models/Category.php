<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,
        HasUUID;

    protected $table = 'categories';

    // protected $fillable = ['name', 'parent_id', 'active', 'description', 'uuid', 'thumbnail', 'percent'];

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean'
    ];

    // public $translatable = ['name'];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id')->withDefault(['name' => '---']);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function podcasts()
    {
        return $this->hasMany(Podcast::class);
    }

    public function discussions()
    {
        return $this->hasMany(Discuss::class);
    }

    public function path()
    {
        return "/categories/$this->slug";
    }

    public function url()
    {
        return url($this->path());
    }

    /**
     * Returns a recursive list of the children categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    /**
     * Filter categories by the given request.
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  array $request
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $request)
    {
        $request = Arr::only($request, ['name', 'description']);

        $query->active()->where(function ($query) use ($request) {
            foreach ($request as $key => $value) {
                $query->orWhere($key, 'like', '%' . $value . '%');
            }
            return $query;
        });

        return $query;
    }


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
