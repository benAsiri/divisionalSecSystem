<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable=['emp_id','basic_salary'];

    public function employe()
    {
        return $this->belongsTo('App\Employe');
    }

    //
}
