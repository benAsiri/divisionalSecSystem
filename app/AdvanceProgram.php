<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvanceProgram extends Model
{
    //
    protected $fillable = [
        'emp_id','Duty', 'handOverDate', 'approvedDate','Status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
