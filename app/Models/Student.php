<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // user_id is foreign key in students table
    }
}
