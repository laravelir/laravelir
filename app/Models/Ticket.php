<?php

namespace App\Models;

use App\Enum\TicketPriorityEnum;
use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Miladimos\Toolkit\Traits\RouteKeyNameUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory,
        HasUUID,
        RouteKeyNameUUID;

    protected $table = 'tickets';

    // protected $fillable = ['title', 'body', 'done', 'done_at', 'uuid', 'code'];

    protected $guarded = [];

    protected $dates = ['deleted_at', 'done_at'];

    protected $with = ['subject', 'children'];

    public static function generateTicketCode()
    {
        do {
            $digits   = array_merge(range(0, 9), range(0, 9), range(0, 9));
            $sChars   = range('a', 'z');
            $cChars   = range('A', 'Z');
            $chars    = array_merge($digits, $sChars, $cChars);
            $arrToStr = implode("", $chars);
            $shuf     = str_shuffle($arrToStr);
            $code     = substr($shuf, 0, 8);
            $exist    = true;

            if (!static::where('code', $code)->exists()) {
                $exist = false;
                return $code;
            }
        } while ($exist);
    }

    public function ticketable()
    {
        return $this->morphTo();
    }

    public function admin()
    {
        $user = User::where('is_admin', 1)->where('id', $this->admin_id)->first();
        return $user->full_name;
    }

    public function subject()
    {
        return $this->belongsTo(TicketSubject::class, 'subject_id');
    }

    public function priority()
    {
        switch ($this->priority) {
            case TicketPriorityEnum::EMERGENCY:
                return 'اورژانسی';
            case TicketPriorityEnum::HIGHT:
                return 'بالا';
            case TicketPriorityEnum::AVERAGE:
                return 'معمولی';
            case TicketPriorityEnum::LOW:
                return 'پایین';
            default:
                # code...
                break;
        }
    }

    public function parent()
    {
        return $this->belongsTo(Ticket::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Ticket::class, 'parent_id', 'id');
    }

    public function project()
    {
        //
    }

    public function isDone()
    {
        return (bool) $this->done_at;
    }

    public function isReply()
    {
        return (bool) $this->is_reply;
    }

    public function isAdminReply()
    {
        return (bool) $this->admin_id;
    }

    public function hasAttachment()
    {
        return !!$this->attachment;
    }

    public function downloadAttachment()
    {
        return response()->download($this->attachment);
    }
}
