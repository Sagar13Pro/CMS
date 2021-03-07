<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstName',
        'lastName',
        'mobileNo',
        'state',
        'city',
        'avatar',
        'email_verified',
        'remember_token',
    ];
    protected $attributes = [
        'remember_token' => NULL,
        'password' => NULL,
        'avatar' => NULL,
        'email_verified' => False,
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //accessor=> when accessing from db it will called
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    //For getting full name of user
    public function getFullNameAttribute()
    {
        return "{$this->firstName} {$this->lastName}";
    }

    //mutator=>sending data to db it will called
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['firstName'] = strtolower($value);
    }
    public function setLastNameAttribute($value)
    {
        $this->attributes['lastName'] = strtolower($value);
    }
}
