<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $fillable = [
     'name','nic', 'leaveType', 'noOfDays',
    ];

    public function user()
    {
        //mapping
        //here you have to map with the employee
        return $this->belongsTo('App\User');
    }

}
