<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deed extends Model
{
    protected $fillable = [
        'ID', 'deed_no','deed_type','deed_owner','extent','present_owner','nominee','reference_no'
    ];
}
