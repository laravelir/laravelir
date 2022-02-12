<?php

namespace App\Models;

use App\Enum\AuthGuardEnum;
use App\Traits\HasUUID;
use App\Traits\RouteKeyNameUUID;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Freelancer extends Authenticatable
{
    use HasFactory,
        Notifiable,
        HasUUID,
        HasRoles,
        RouteKeyNameUUID;


    protected $table = 'freelancers';

    protected $with = ['profile'];

    protected $guard = AuthGuardEnum::FREELANCER;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'uuid',
    //     'name',
    //     'email',
    //     'password',
    //     'acquaintedUs'
    // ];

    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(FreelancerProfile::class);
    }

    public function wallet()
    {
        return $this->morphOne(Wallet::class, 'walletable');
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function payouts()
    {
        return $this->hasMany(Payout::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'freelancer_id');
    }

    public function legal()
    {
        return $this->morphOne(LegalInfo::class, 'legalable');
    }

    public function activationCodes()
    {
        return $this->morphMany(ActivationCode::class, 'codeable');
    }

    public function banks()
    {
        return $this->morphMany(Bankable::class, 'bankables');
    }

    public function tickets()
    {
        return $this->morphMany(Ticket::class, 'ticketable');
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'freelancer_languages', 'freelancer_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'freelancer_categories', 'freelancer_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'freelancer_skills', 'freelancer_id');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function hasLegalInfo()
    {
        return !!$this->legal->completed;
    }

    public function hasResumeFile()
    {
        return !!$this->profile->resume_file;
    }

    public function finalPercent()
    {
        return ($this->percent);
    }

    public function isOfficial()
    {
        return !!$this->official;
    }

    public function isCurrentMobileActivated()
    {
        return !!$this->mobile_verified_at;
    }

    public function isNationalCardUploaded()
    {
        return !!$this->profile->national_card_image && !!$this->profile->national_code;
    }

    public function isNationalCardApproved()
    {
        return !!$this->profile->national_card_image && !!$this->profile->national_card_image_approved;
    }

    public function isHaveNationalCode()
    {
        return !!$this->profile->national_code;
    }

    public function isMobileActivated($mobile)
    {
        if ($this->where('mobile', $mobile)->first() && !is_null($this->mobile_verified_at))
            return true;
        return false;
    }

    public function isEmailActivated()
    {
        return !!$this->email_verified_at;
    }

    public function isActivate()
    {
        return $this->isEmailActivated() && $this->isCurrentMobileActivated() && $this->isNationalCardApproved();
    }

    // public function hasPermission($permission)
    // {
    //     return $this->permissions()->contains('name', $permission->name) || $this->hasRole($permission->roles);
    // }

    // public function hasRole($roles)
    // {
    //     return !! $roles->intersect($this->roles)->all();
    // }

    public static function findByUsername(string $username): self
    {
        return static::where('username', $username)->firstOrFail();
    }

    public static function findByEmailAddress(string $emailAddress): self
    {
        return static::where('email', $emailAddress)->firstOrFail();
    }

    public static function findByPhone(string $emailAddress): self
    {
        return static::where('email', $emailAddress)->firstOrFail();
    }

    public static function findByProviderId(string $providerId): self
    {
        return static::where('provider_id', $providerId)->firstOrFail();
    }

    public function path()
    {
        return "/@{$this->username}";
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getFullNameAttribute()
    {
        return $this->profile->fname . ' ' . $this->profile->lname;
    }
    public function getLabelAttribute()
    {
        return $this->profile->fname . ' ' . $this->profile->lname . ' - ' . $this->username;
    }

    public function getAvatarAttribute()
    {
        return isset($this->profile->avatar) ? asset("/public/avatars/default.jpg") : asset($this->profile->avatar);
    }


    public static function generateUsername()
    {
        do {
            $digits   = array_merge(range(0, 9), range(0, 9), range(0, 9));
            $sChars   = range('a', 'z');
            $cChars   = range('A', 'Z');
            $chars    = array_merge($digits, $sChars, $cChars);
            $arrToStr = implode("", $chars);
            $shuf     = str_shuffle($arrToStr);
            $username     = 'rsaf_' . substr($shuf, 0, 8);
            $exist    = true;

            if (!static::where('username', $username)->exists()) {
                $exist = false;
                return $username;
            }
        } while ($exist);
    }

    public function scopeActivate($query, $arg)
    {
        return $query->where('email_verified_at', $arg);
    }

    public function generateUserToken($token)
    {
        return Crypt::encryptString($token);
    }
}
