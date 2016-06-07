<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name', 'username', 'password',
=======
       'NIC', 'name', 'username', 'password','status','position'
>>>>>>> 9433c531a44c6f164c418979d3209923dfbd288e
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
<<<<<<< HEAD
    public function adPrograms(){
               return $this->hasMany('App\AdvanceProgram');
    }
=======
    public function employe()
    {
        return $this->belongsTo('App\Employe');
    }



//    public function Loan(){
//        // in here um creating the same mapping form the user side
//        return $this->hasMany('App\Loan');

//    public function adPrograms(){
//        return $this->hasMany('App\AdvanceProgram');
//
//    }
>>>>>>> 9433c531a44c6f164c418979d3209923dfbd288e
}
