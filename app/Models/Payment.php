<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory,
        HasUUID;

    protected $table = 'payments';

    // protected $fillable = ['user_id', 'resnumber', 'course_id', 'price', 'payment', 'uuid'];

    protected $guarded = [];

    public function factor()
    {
        return $this->hasOne(Factor::class);
    }

    public function paymentable()
    {
        return $this->morphTo();
    }

    public function paymentUrl()
    {
        //
    }

    public function paymentCallBackUrl()
    {
        //
    }
}
