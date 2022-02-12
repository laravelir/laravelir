<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasUUID;

    // protected $fillable = [
    //     'user_id',
    //     'parent_id',
    //     'comment',
    //     'approved',
    //     'commentable_id',
    //     'commentable_type',
    //     'uuid'
    // ];

    protected $guarded = [];

    protected $table = 'comments';

    protected $with = ['comments', 'commentator'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id')->where('approved', 1)->latest();
    }

    public function commentator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeApproved($query, $approved)
    {
        return $query->where('approved', $approved);
    }

    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = str_replace(PHP_EOL, "<br>", $value);
    }

    public function approve()
    {
        $this->update([
            'is_approved' => true,
        ]);

        return $this;
    }

    public function disapprove()
    {
        $this->update([
            'is_approved' => false,
        ]);

        return $this;
    }

}
