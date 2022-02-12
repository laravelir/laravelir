<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreelancerProfile extends Model
{
    use HasFactory,
        HasUUID;

    protected $table = 'freelancer_profiles';

    // protected $fillable = [
    //     'freelancer_id', 'fname', 'lname', 'uuid', 'gender', 'site',
    //     'bio', 'telegram', 'instagram', 'linkedin', 'twetter',
    // ];

    protected $guarded = [];

    public $timestamps = false;

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }
}
