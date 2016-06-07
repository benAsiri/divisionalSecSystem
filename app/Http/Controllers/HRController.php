<?php

namespace App\Http\Controllers;


use App\Employe;
use DB;
use Illuminate\Support\Facades\Input;
use UxWeb\SweetAlert;

class HRController extends Controller
{
    //
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function addEmployee()
    {
        return view('HR.employee.newEmployee');
    }

    public function searchEmployee()
    {
        $employee=DB::table('employes')->get();
        return view('HR.employee.searchEmployee',compact('employee'));
    }

    public function addEmployeeDetails()
    {


        if(Input::ajax()) {
            $data = Input::all();
            print_r($data['dob']);


            $employe=new Employe();

            $employe->surname=$data['surname'];
            $employe->fullname=$data['fullname'];
            $employe->id_num=$data['nic'];
            $employe->address=$data['address'];
            $employe->dob=$data['dob'];
            $employe->gender=$data['gender'];
            $employe->race=$data['race'];
            $employe->marital_state=$data['maritals'];
            $employe->District=$data['district'];
            $employe->date_of_appoint=$data['doa'];
            $employe->appointment_no=$data['appNo'];
            $employe->widow_no=$data['widowNo'];
            $employe->job_position=$data['jobPos'];
            $employe->job_grade=$data['jobGrade'];




           $employe->save();



        }




    }



}
