<?php

namespace App\Models;

use App\Enum\AuthGuardEnum;
use App\Traits\HasUUID;
use App\Models\UserProfile;
use App\Traits\RouteKeyNameUUID;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory,
        Notifiable,
        HasUUID,
        HasRoles,
        RouteKeyNameUUID;

    protected $table = 'users';

    protected $with = ['profile'];

    protected $guard = AuthGuardEnum::USER;

    // protected $fillable = [
    //     'uuid',
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function legal()
    {
        return $this->morphOne(LegalInfo::class, 'legalable');
    }

    public function wallet()
    {
        return $this->morphOne(Wallet::class, 'walletable');
    }

    public function banks()
    {
        return $this->morphMany(Bankable::class, 'bankables');
    }

    public function activationCodes()
    {
        return $this->morphMany(ActivationCode::class, 'codeable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function seoProjects()
    {
        return $this->hasMany(SeoProject::class, 'user_id', 'id');
    }

    public function adwords()
    {
        return $this->hasMany(Adword::class, 'user_id', 'id');
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function businesses()
    {
        return $this->hasMany(BusinessInfo::class);
    }

    public function tickets()
    {
        return $this->morphMany(Ticket::class, 'ticketable');
    }

    public function discounts()
    {
        return $this->morphedByMany(Discount::class, 'discountable', 'discountables');
    }

    public function skills()
    {
        return $this->morphedByMany(Discount::class, 'skillable');
    }

    public function reportages()
    {
        return $this->hasMany(OrderReportage::class, 'user_id');
    }

    public function packages()
    {
        return DB::table('order_packages')->where('user_id', $this->id)->orderBy('created_at')->get();
    }

    public function getPackageOrders()
    {
        $ps = collect($this->packages());
        $orders = $ps->map(function ($item) {
            return ['title' => Package::find($item->package_id)->title];
        });

        return $orders;
    }

    public function factors()
    {
        return Factor::whereIn('payment_id', $this->payments->pluck('id')->toArray())->get();
    }

    public function isAdmin()
    {
        return !!$this->is_admin;
    }

    public function isMobileActivated($mobile)
    {
        if ($this->where('mobile', $mobile)->first() && !is_null($this->mobile_verified_at))
            return true;
        return false;
    }

    public function hasDiscount()
    {
        return $this->discounts()->first();
    }

    public function isEmailActivated()
    {
        return !!$this->email_verified_at;
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
        return !!$this->profile->national_card_image &&  !!$this->profile->national_card_image_approved;
    }

    public function isHaveNationalCode()
    {
        return !!$this->profile->national_code;
    }

    public function isActivate()
    {
        return !! $this->isCurrentMobileActivated();
    }

    public function hasLegalInfo()
    {
        return !!$this->legal->completed;
    }

    public function hasBusinessInfo()
    {
        return !!$this->business->completed;
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
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

    public function url()
    {
        return url($this->path());
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
            $username     = 'rsa_' . substr($shuf, 0, 8);
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
