<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leaves_remain extends Model
{
    protected $fillable = [
        'Emp_Id','casual_leave', 'vac_leave','others','previous'
    ];


    public function user()
    {
        return $this->hasOne('App\leaves_remain');
    }
}
