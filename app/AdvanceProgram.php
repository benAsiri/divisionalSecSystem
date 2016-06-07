<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvanceProgram extends Model
{
<<<<<<< HEAD

        protected $table = "advance_programs";


        protected $fillable = [
                'emp_id', 'handOverDate', 'approvedDate','Status'
            ];

    public function user()
    {
               return $this->belongsTo('App\User');
    }

}
=======
    //
    protected $fillable = [
        'emp_id', 'handOverDate', 'approvedDate','Status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
>>>>>>> 9433c531a44c6f164c418979d3209923dfbd288e
