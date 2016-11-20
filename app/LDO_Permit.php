<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LDO_Permit extends Model
{
    protected $fillable = [
        'ID', 'permit_no','GS_division','name_of_village', 'name_of_land','permit_holder_name','extent','present_owner','present_situation','cancellation'
    ];




}
