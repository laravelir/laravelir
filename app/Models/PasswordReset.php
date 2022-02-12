<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'password_resets';

    protected $fillable = ['email', 'phone', 'token', 'created_at', 'expired_at', 'type'];

    public $timestamps = false;
}
