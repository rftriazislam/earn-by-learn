<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'role',
        'refered_id',
        'country',
        'country_code',
        'state',
        'currency',
        'name',
        'email',
        'phone',
        'flag',
        'address',
        'latitude',
        'longitude',
        'image',
        'balance',
        'active',
        'status',
        'verifycode',
        'password',
        'condition_check'
    ];

    public function mentor()
    {
        return $this->hasOne('App\Models\User', 'id', 'refered_id');
    }

    public function mentor_payment()
    {
        return $this->hasMany('App\Models\PaymentMethod', 'user_id', 'id');
    }


    public function student_level()
    {
        return $this->hasOne('App\Models\StudentLevel', 'user_id', 'id')
            ->where('first_mentor_id', '!=', NUll)
            ->where('second_mentor_id', '!=', NUll)
            ->where('admin', '!=', NUll);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}