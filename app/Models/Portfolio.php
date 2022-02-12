<?php

namespace App\Models;

use App\Enum\PortfolioTypeEnum;
use App\Traits\HasUUID;
use App\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory,
        HasUUID,
        RouteKeyNameUUID;

    protected $table = 'portfolios';

    // protected $fillable = ['user_id', 'title', 'uuid', 'description', 'file', 'image'];

    protected $guarded = [];

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'portfolio_skills');
    }

    public function hasAttachment()
    {
        return !!$this->file;
    }

    public function type()
    {
        switch ($this->type) {
            case PortfolioTypeEnum::TEXT:
                return 'نمونه کار متنی';
                break;
            case PortfolioTypeEnum::INFOGRAPHIC:
                return 'نمونه کار اینفوگرافیک';
                break;
            case PortfolioTypeEnum::VIDEO:
                return 'نمونه کار ویدئویی';
                break;
            case PortfolioTypeEnum::SOUND:
                return 'نمونه کار صوتی';
                break;
            default:
                # code...
                break;
        }
    }
}
