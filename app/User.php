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
       'NIC', 'name', 'username', 'password','status','position'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
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
}
