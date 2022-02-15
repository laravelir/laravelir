<?php

namespace App\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;

class Skill extends Model
{
    use HasUUID,
        HasTranslations,
        RouteKeyNameUUID;

    protected $table = 'skills';

    // protected $fillable = ['title', 'description', 'uuid', 'slug'];

    protected $guarded = [];

    public $translatable = ['title'];

    public function parent()
    {
        return $this->hasOne(Skill::class, 'id', 'parent_id')->withDefault(['title' => '---']);
    }

    /**
     * Returns a list of the children categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Skill::class, 'parent_id', 'id');
    }

    public function freelancers()
    {
        return $this->belongsToMany(Freelancer::class, 'freelancer_skills');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
