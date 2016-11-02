<?php

namespace App\Http\Controllers;
use App\Employe;
use App\Salary;
use DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Request;
use UxWeb\SweetAlert;
use Barryvdh\DomPDF\Facade as PDF;

class HRController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function addEmployee()
    {
        return view('HR.employee.newEmployee');
    }

    public function loadUpdateEmployees()
    {
        $employee=DB::table('employes')->get();
        return view('HR.employee.UpdateDetails',compact('employee'));
    }

    public function loadEmpSalary()
    {
        $employee=DB::table('employes')->get();
        return view('HR.employee.employeeSalary',compact('employee'));
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
            //return url('AddEmployees');
            
           

        }




    }

    public function addSalaryDetails()
    {

        if(Input::ajax()){


            $data=Input::all();
            $salary=new Salary();

            //var_dump($data);

            $salary->emp_id = (int)$data['empid'];
            $salary->basic_salary = $data['salary'];
            $salary->save();

        }
    }

    public function generatePDF(Request $request){

        $employee=DB::table('employes')->get();


        

        $pdf = PDF::loadView('/HR/reports/employeeRecordsReport',['employee'=>$employee]);
        return $pdf->download('employee_details_report.pdf');
    }



    public function deleteEmployee($id){

        $employee =  Employe::find($id);

        $employee->delete();

        //return redirect()->action('HRController@loadUpdateEmployees');
        return redirect('LoadEmployeeDetails');

    }




    public function UpdateEmployeeDetail(Request $request){

        //var_dump($request);

        //echo $request['empid'];
        $employee =  Employe::find($request['empid']);

//        $employee =  Employe::find($request['empid']);
//
        $employee->surname=$request['surname'];
        $employee->fullname=$request['fullname'];
        $employee->id_num=$request['nic'];
        $employee->address=$request['address'];


        $employee->dob=$request['datepicker_dob'];
        $employee->gender=$request['gender'];
        $employee->marital_state=$request['maritalState'];
        $employee->date_of_appoint=$request['datepicker_doa'];
        $employee->appointment_no=$request['appNo'];
        $employee->job_position=$request['jobp'];
        $employee->job_grade=$request['jobg'];
        $employee->widow_no=$request['widowNo'];

        $employee->save();


        //return redirect()->action('HRController@loadUpdateEmployees');
        //return redirect()->action('HRController@addEmployee');


    }




}
