<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userComp extends Model
{
    use HasFactory;
    protected $table = "UserComplaints";
    protected $attributes = ['status' => 'Registered', 'updated_at' => null];
    protected $fillable = [
        'Complaint_ID',
        'foreignEmail',
        'ComplaintType',
        'ComplaintCategory',
        'SubCategory',
        'AuthDept',
        'ComplaintNature',
        'District',
        'City',
        'Pincode',
        'ReferenceNo',
        'ComplaintDetails',
        'ComplaintDate',
    ];

    public function setComplaintIDAttribute($value)
    {
        if (count(userComp::all()) <= 0) {
            $this->attributes['Complaint_ID'] = $value;
        } else {
            $id = userComp::all()->last();
            $value =  $id->Complaint_ID + 1;
            $this->attributes['Complaint_ID'] = $value;
        }
    }
}
