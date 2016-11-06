<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'Emp_Id', 'position','leavetype','dept', 'commencingleave','days','reason','status'
    ];


    public function user()
    {
        return $this->belongsTo('App\Employe');
    }
}
