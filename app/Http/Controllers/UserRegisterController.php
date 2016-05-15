<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use App\Http\Requests;

class UserRegisterController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }


   public function index(){

      $employees =DB::table('users')->get();

      return view('UserMgt/usermgt',compact('employees'));

   }
}
