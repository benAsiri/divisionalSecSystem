<?php
/**
 * Created by PhpStorm.
 * User: Asi
 * Date: 10/15/2016
 * Time: 5:00 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Mleave extends Model
{
    protected $fillable=['Emp_Id','chkMedicalCertificate','chkChildBirthCertificate','StartLeaveDate','EndLeaveDate','reason','noOfChilds','status'];
    public function user()
    {
        return $this->hasOne('App\User');
    }
}