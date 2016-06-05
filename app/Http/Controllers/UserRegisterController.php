<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use app\User;
use App\Http\Requests;

class UserRegisterController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }


   public function index(){

      $employees =DB::table('employes')->get();
      $users = DB::table('users')->get();
      return view('UserMgt/usermgt',compact('employees','users'));


   }

   public function registeruser(Request $request){

      User::create([
          'name' => $request['faname'],
          'NIC' => $request['NIC'],
          'username' => $request['username'],
          'password' => bcrypt($request['password']),
          'status' => $request['status'],
          'position' => $request['position'],

      ]);

      return back();
   }


   public function delete()
   {
      $id = $_GET['id'];

      DB::table('users')
          ->where('NIC', $id)
          ->delete();

      return back();
   }
   public function update()
   {
      $id = $_GET['id'];
      $st = $_GET['stat'];
      $ps = $_GET['post'];

      DB::table('users')
          ->where('NIC', $id)
          ->update(['status' => $st, 'position' => $ps]);

      return back();
   }
}
