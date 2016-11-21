<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['Emp_Id','Emp_Name', 'Emp_Pos', 'Emp_Grade', 'Loan_request_date', 'Ldoc', 'Special_notes','Loan_status'];

    public function user()
    {
        //mapping
        //here you have to map with the employee
        return $this->belongsTo('App\User');
    }

}
