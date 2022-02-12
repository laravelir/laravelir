<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Enum\AuthGuardEnum;
use App\Models\UserProfile;
use App\Traits\RouteKeyNameUUID;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'username_changed_at' => 'datetime',
        'password_changed_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }


    public function wallet()
    {
        return $this->morphOne(Wallet::class, 'walletable');
    }

    public function activationCodes()
    {
        return $this->morphMany(ActivationCode::class, 'codeable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
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

    public function packages()
    {
        return $this->hasMany(Package::class);
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

    public function isHaveNationalCode()
    {
        return !!$this->profile->national_code;
    }

    public function isActivate()
    {
        return !!$this->isEmailActivated();
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

    public function password(): Attribute
    {
        return new Attribute(
            set: fn ($value) =>  $this->attributes['password'] = bcrypt($value),
        );
    }

    public function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->profile->fname . ' ' . $this->profile->lname,
        );
    }

    public function label(): Attribute
    {
        return new Attribute(
            get: fn () => $this->profile->fname . ' ' . $this->profile->lname . ' - ' . $this->username,
        );
    }

    public function getAvatarAttribute(): Attribute
    {
        return new Attribute(
            get: fn () => isset($this->profile->avatar) ? asset("/public/avatars/default.jpg") : asset($this->profile->avatar),
        );
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
            $username     = 'lir_' . substr($shuf, 0, 8);
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
