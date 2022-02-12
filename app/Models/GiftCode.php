<?php

namespace App\Models;

use App\Enums\GiftCodeTypeEnum;
use Illuminate\Support\Facades\DB;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiftCode extends Model
{
    use HasFactory,
        HasUUID,
        RouteKeyNameUUID,
        Sluggable;

    protected $table = 'gift_codes';

    // protected $fillable = ['title', 'code', 'expired_at', 'used', 'used_count'];

    protected $guarded = [];

    protected $casts = [
        'expired_at' => 'timestamp',
    ];

    public function users()
    {
        return $this->morphedByMany(User::class, 'giftcodeable');
    }

    public function usedUsers()
    {
        return DB::table('giftcode_users')->where(['giftcodeable_type' => User::class, 'giftcode_id' => $this->id])->get();
    }

    public function type()
    {
        switch ($this->type) {
            case GiftCodeTypeEnum::FOR_GLOBAL:
                return 'سراسری';
            case GiftCodeTypeEnum::FOR_USER:
                return 'مختص به کاربر';
            default:
                # code...
                break;
        }
    }

    public function scopeActive($query)
    {
        return $query->where('expired', 0)->where('expired_at', '<', now());
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
