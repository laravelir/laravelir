<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory,
        HasUUID,
        HasTranslations;

    protected $table = 'languages';

    protected $fillable = ['title', 'country_id', 'uuid', 'active'];

    public $translatable = ['title'];

    public function freelancers()
    {
        return $this->belongsToMany(Freelancer::class, 'freelancer_languages');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_languages');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
