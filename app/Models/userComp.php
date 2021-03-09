<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userComp extends Model
{
    use HasFactory;
    protected $table = "UserComplaints";
    //protected $casts = ['updated_at' => 'datetime:Y-m-d H:00'];
    protected $attributes = [
        'status' => 'Registered',
        'Remarks' => 'Not Assigned',
        'updated_at' => null,
    ];
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
        'user_id',
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
    public function getUpdatedAtAttribute($value)
    {
        //if $value is Null no need to convert and return null only.
        if (!is_null($value)) {
            return  date('Y-m-d h:i:s', strtotime($value));
        }
        return $value;
    }
    public function setUserIdAttribute($value)
    {
        $userid = User::where('email', $value)->get()[0];
        $this->attributes['user_id'] = $userid->id;
    }
}
