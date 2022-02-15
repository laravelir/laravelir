<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $table = 'podcasts';

    // protected $fillable = [];

    protected $guarded = [];

    // protected $casts = [
    //     'content_keywords' => 'array',
    //     'synonym_words' => 'array',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->morphedByMany(Tag::class, 'taggable');
    }
}
