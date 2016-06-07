<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvanceProgram extends Model
{

        protected $table = "advance_programs";


        protected $fillable = [
                'emp_id', 'handOverDate', 'approvedDate','Status'
            ];

    public function user()
    {
               return $this->belongsTo('App\User');
    }

}