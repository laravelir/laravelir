<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory,
        Sluggable,
        HasUUID,
        RouteKeyNameUUID;

    protected $table = 'cities';

    protected $fillable = ['title', 'slug', 'province_id', 'uuid'];

    public function businessInfos()
    {
        return $this->hasMany(BusinessInfo::class, 'id', 'province_id');
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
