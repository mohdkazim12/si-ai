<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['marked_by','user_id','date','status','marked_at'];
    

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
