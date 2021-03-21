<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Dept extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'password',
        'firstName',
        'lastName',
        'mobileNo',
    ];

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
