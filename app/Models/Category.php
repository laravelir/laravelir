<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory,
        HasUUID,
        HasTranslations;

    protected $table = 'categories';

    // protected $fillable = ['name', 'parent_id', 'active', 'description', 'uuid', 'thumbnail', 'percent'];

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean'
    ];

    public $translatable = ['name'];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id')->withDefault(['name' => '---']);
    }

    /**
     * Returns a list of the children categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    // public function portfolios()
    // {
    //     return $this->morphedByMany(BusinessInfo::class, 'categoriable', 'categoriables');
    // }

    // public function businesses()
    // {
    //     return $this->morphedByMany(BusinessInfo::class, 'categoriable', 'categoriables');
    // }

    public function path()
    {
        return "/categories/$this->uuid";
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
