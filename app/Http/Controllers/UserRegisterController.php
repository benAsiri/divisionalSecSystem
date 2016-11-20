<?php

namespace App\Http\Controllers;


//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
//use DB;
//use app\User;
//use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Mockery\CountValidator\Exception;




class UserRegisterController extends Controller
{
//   public function __construct()
//   {
//      $this->middleware('auth');
//   }


   public function index(){

      $employees =DB::table('employes')->get();
      $users = DB::table('users')->get();
      return view('UserMgt/usermgt',compact('employees','users'));


   }

   protected function registeruser(Request $request){


       $this->validate($request, array(
           'faname'=> 'required|not_in:0',
           'NIC'=> 'required',
           'username'=>'required|max:20',
           'password'=>'required',
           'password_confirmation'=>'required',
           'status'=> 'required|not_in:0',
           'position'=>'required|not_in:0'


       ));




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
   protected function update()
   {
      $id = $_GET['id'];
      $st = $_GET['stat'];
      $ps = $_GET['post'];

      DB::table('users')
          ->where('NIC', $id)
          ->update(['status' => $st, 'position' => $ps]);

      return back();
   }


    protected function resetPW(){
        {
            $id = $_GET['id'];


            DB::table('users')
                ->where('NIC', $id)
                ->update(['password' => bcrypt($id)]);

            return back();
        }

    }



    /**
     * Edit User Profile Details
     * @param Request $request
     * @return mixed
     */

    public function editProfile(){
        return view('auth/profile');
    }



    /**
     * User Profile Edit Details Save
     * @param Request $request
     */
    public function editProfileSave(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        if($validator->passes()){
            $user = Auth::user();
            $userID = $user->id;

            $user->name = Input::get('name');
            $user->password = bcrypt(Input::get('password'));

            /* This function will upload image */
            if (Input::file('profile_img') != null) {
                $user->image = "user_profile_img_" . $userID . ".png";
                self::upload_image($request, $userID);
            }

            $user->save();

            return Redirect('/');
        }else{
            return Redirect::to('/EditProfile')->withInput()->withErrors($validator);
        }
    }

    /*
      * This function Uploads images to Server '/resources/assets/profile_images/' Folder
      */
    public function upload_image(Request $request,$user_id){
        try {
            $imageName = "user_profile_img_" . $user_id . ".png";
            $destinationPath = base_path() . '/public/profile_images/';
            Input::file('profile_img')->move($destinationPath, $imageName);
        }catch (Exception $e){
            dd('User Profile Image Upload',$e);
        }
    }










}
