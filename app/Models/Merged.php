<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merged extends Model
{
    use HasFactory;
    protected $fillable = [
        'Merged_ID',
        'Complaint_ID',
        'user_id',
        'ComplaintType',
        'ComplaintCategory',
        'SubCategory',
        'AuthDept',
        'status',
        'Remarks'
    ];
    public function setComplaintIDAttribute($value)
    {
        if (!is_null($value)) {
            $this->attributes['Complaint_ID'] = json_encode($value);
        }
    }
    public function setUserIDAttribute($value)
    {
        if (!is_null($value)) {
            $this->attributes['user_id'] = json_encode($value);
        }
    }
    public function getUpdatedAtAttribute($value)
    {
        if (!is_null($value)) {
            return  date('Y-m-d h:i:s', strtotime($value));
        }
        return $value;
    }
}
