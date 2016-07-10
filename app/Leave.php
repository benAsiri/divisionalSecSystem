<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'Emp_Id', 'position','leavetype','dept', 'commencingleave','resumingduties','reason','status'
    ];


    public function user()
    {
        return $this->hasOne('App\Leave');
    }
}