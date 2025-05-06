<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Student;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'status',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student() : hasOne
    {
        return $this->hasOne(Student::class);
    }
    public function studentDetails(): HasMany
    {
        return $this->hasMany(Student::class);
    }
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function attendanceDetails(): hasOne
    {
        return $this->hasOne(Attendance::class)->where('date','2025-05-04');
    }
}
