<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiddleClass extends Model
{
    protected $fillable = [
        'ID','plan_no','lot_no','file_no','gs','grant','issue_date','owner','extent','present_owner','present_situ','nominee','transfer'
    ];
}



