<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merged extends Model
{
    use HasFactory;
    protected $fillable = [
        'Merged_ID',
        'Complaint_ID'
    ];
}
