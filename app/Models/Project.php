<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use App\Enum\ContentOrderStatusEnum;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory,
        HasUUID,
        RouteKeyNameUUID;


    protected $table = 'projects';

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

    public function category()
    {
        return Category::find($this->category_id);
    }

    public function quality()
    {
        return $this->hasOne(ContentQuality::class, 'id', 'quality_id');
    }

    public function addons()
    {
        return DB::table('project_addons')->where('project_id', $this->id)->get();
    }

    public function attachments()
    {
        return DB::table('project_attachments')->where('project_id', $this->id)->get();
    }

    public function requests()
    {
        return DB::table('project_freelancer_requests')->where('project_id', $this->id)->get();
    }

    public function freelancerRequested($freelancer_id)
    {
        return DB::table('project_freelancer_requests')->where('project_id', $this->id)->where('freelancer_id', $freelancer_id)->first();
    }

    public function comment()
    {
        return [
            'comment' => $this->comment,
            'rate' => $this->rate,
        ];
    }

    public function storeCommment($comment, $rate)
    {
        return (bool)$this->update([
            'comment' => $comment,
            'rate' => $rate,
        ]);
    }

    public function isApproved()
    {
        return (bool)$this->approved;
    }

    public function hasAttachment()
    {
        return !!$this->attachment_file;
    }

    public function status($locale = 'fa')
    {
        switch ($this->status) {
            case ContentOrderStatusEnum::NEW:
                return $locale == 'fa' ? 'انجام نشده' : 'Un Done';
            case ContentOrderStatusEnum::REJECTED:
                return $locale == 'fa' ? 'رد شده' : 'Rejected';
            case ContentOrderStatusEnum::IN_PROGRESS:
                return $locale == 'fa' ? 'در حال انجام' : 'In Progress';
            case ContentOrderStatusEnum::DONE:
                return $locale == 'fa' ? 'انجام شده' : 'Done';
            default:
                # code...
                break;
        }
    }

    public function isProjectDone()
    {

        if (haveAnyUploadedContentAttachment($this->id)) {
            return DB::table('project_attachments')->where([
                'project_id' => $this->id,
                'approved' => true,
                'customer_approved' => true,
            ])->count() == $this->count;
        }
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

}
