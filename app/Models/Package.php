<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Translatable\HasTranslations;

class Package extends Model
{
    use HasFactory,
        HasUUID,
        HasTranslations,
        RouteKeyNameUUID;

    // protected $fillable = ['orderable_id', 'user_id'];

    protected $table = 'packages';

    protected $guarded = [];

    public $translatable = ['title'];

    public function customers()
    {
        return DB::table('order_packages')->where(['package_id' => $this->id])->pluck('user_id');
    }

    public function hasDiscount()
    {
        return !!$this->price_discount;
    }

    public function hasDollarDiscount()
    {
        return !!$this->dollar_price_discount;
    }

    public function finalPrice()
    {
        if (currentLocale() == 'fa')
            return $this->hasDiscount() ? $this->price_discount : $this->price;

        return $this->hasDollarDiscount() ? $this->dollar_price_discount : $this->dollar_price;
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
