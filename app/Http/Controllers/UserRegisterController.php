<?php

namespace App\Http\Controllers;




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

use Andheiberg\Notify\Facades\Notify;





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

    protected function registeruser(Request $request){


        $this->validate($request, array(
            'faname'=> 'required|not_in:0',
            'NIC'=> 'required',
            'username'=>'required|max:20',
            'password'=>'required',
            'password_confirmation'=>'required|same:password',
            'status'=> 'required|not_in:0',
            'position'=>'required|not_in:0'


        ));

        $info = DB::table('users')->where('NIC',$request['NIC'])->count();


        if($request['position']== "Divisional Secretary"){

            $count_of_secretary = DB::table('users')->where('position',$request['position'])->count();

            if( $count_of_secretary ==0){

                User::create([
                    'name' => $request['faname'],
                    'NIC' => $request['NIC'],
                    'username' => $request['username'],
                    'password' => bcrypt($request['password']),
                    'status' => $request['status'],
                    'position' => $request['position'],

                ]);




                Notify::success('Admin has been added!');
            }
            else{

                Notify::error('Divisional Secretary already in the system!');
            }

        }


        if($info == 0) {

            User::create([
                'name' => $request['faname'],
                'NIC' => $request['NIC'],
                'username' => $request['username'],
                'password' => bcrypt($request['password']),
                'status' => $request['status'],
                'position' => $request['position'],

            ]);


            Notify::success('New User has been added!');

        }
        else{


            Notify::error('User already added!');
        }


        return back();

    }


    public function delete()
    {
        $id = $_GET['id'];

        DB::table('users')
            ->where('NIC', $id)
            ->delete();

        Notify::success('User details has been deleted!');

        return back();
    }
    protected function update(Request $request)
    {
        $this->validate($request, array(
            'stat'=> 'required|not_in:0',
            'post'=>'required|not_in:0',


        ));

        $id = $_GET['id'];
        $st = $_GET['stat'];
        $ps = $_GET['post'];

        DB::table('users')
            ->where('NIC', $id)
            ->update(['status' => $st, 'position' => $ps]);


        Notify::success('User details has been updated!');

        return back();
    }


    public function showdata(Request $request){
        $nic=DB::table('employes')->where('fullname',$request->data)->value('id_num');
        return $nic;
    }



    protected function resetPW(Request $request){
        {
            $id = $_GET['id'];


            DB::table('users')
                ->where('NIC', $id)
                ->update(['password' => bcrypt($id)]);


           // return redirect()->back()->flash('User passwords successfully reset!', 'success');
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
