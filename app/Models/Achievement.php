<?php

namespace App\Models;

use App\Enums\AchievementTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Miladimos\Toolkit\Traits\HasUUID;

class Achievement extends Model
{
    use HasUUID,
        RouteKeyNameUUID;

    protected $table = 'achievements';

    //    protected $fillable = [
    //        'name',
    //        'email',
    //        'password',
    //    ];

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'achievements_users_pivot', 'achievement_id', 'users_id');
    }

    public function type()
    {
        switch ($this->type) {
            case AchievementTypeEnum::COMMON:
                return 'عمومی';
            case AchievementTypeEnum::USER:
                return 'کاربران';
            case AchievementTypeEnum::EXPERT:
                return 'متخصصین';
            default:
                # code...
                break;
        }
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function path()
    {
        return "/achievements/$this->uuid";
    }

    public function url()
    {
        return url($this->path());
    }
}
