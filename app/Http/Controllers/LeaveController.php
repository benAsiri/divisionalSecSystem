<?php

namespace App\Http\Controllers;

use App\Employe;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use DateTime;
use Illuminate\Support\Facades\Session;
use App\Leave;
use App\leaves_remain;
use Barryvdh\DomPDF\Facade as PDF;
use Andheiberg\Notify\Facades\Notify;

class LeaveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $employees =DB::table('employes')->get();
        $leaves =DB::table('leaves')->get();

        return view('HR/LeaveManage/applyleavess',compact('leaves','employees'));



    }
    public function showdata(Request $request){
        $jobpos=DB::table('employes')->where('id_num',$request->data)->value('job_position');
        return $jobpos;
    }

    /**
     * Put pending request to the head of the office
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexforHead(){

        $leaves =DB::table('leaves')->where('status', 'pending')->get();

        return view('HR/leavesopinions',compact('leaves'));


    }

    protected function remaining(leaves_remain $remain){

        $Emp_IDS =DB::table('employes')->lists('id_num');
        $year=date("Y");
        $previous_year =$year-1;
        $tempArray = array();
        foreach ($Emp_IDS as $value){
         $employee_name =  DB::table('employes')->where('id_num', $value)->value('fullname');


          $casual_leaves= DB::table('leaves')->where('status', 'Approved')->where('commencingleave','LIKE', '%'.$year.'%')->where('leavetype', 'Casual')->where('Emp_Id', $value)->sum('days');


          $vacation_leaves=DB::table('leaves')->where('status', 'Approved')->where('commencingleave','LIKE', '%'.$year.'%')->where('leavetype','Vacation')->where('Emp_Id', $value)->sum('days');

          $others=DB::table('leaves')->where('status', 'Approved')->where('commencingleave','LIKE', '%'.$year.'%')->where('leavetype', 'Others')->where('Emp_Id',$value)->sum('days');

            $previous_year_leaves =DB::table('leaves')->where('status', 'Approved')->where('commencingleave','LIKE', '%'.$previous_year.'%')->where('leavetype','not like', 'Others')->where('Emp_Id',$value)->sum('days');

            $previous_yr_extra_leaves = 45 - $previous_year_leaves;

            array_push($tempArray,array($employee_name,$value,$casual_leaves,$vacation_leaves,$others,$previous_yr_extra_leaves));
        }


       return view('HR/LeaveManage/view_remaining_leaves',compact('tempArray'));


    }

    /**
     * Reject leave
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function Reject()
    {
        $id = $_GET['id'];
        $leavetype=$_GET['leave_t'];
        $commence_date= $_GET['commence_date'];

        DB::table('leaves')
            ->where('Emp_Id', $id)
            ->where('leavetype',$leavetype)
            ->where('commencingleave',$commence_date)
            ->update(['status' => 'Rejected']);

        return back();
    }

    /**
     * Approve leave
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function Approve()
    {

        $id = $_GET['id'];
        $leavetype=$_GET['leave_t'];
        $commence_date= $_GET['commence_date'];

        DB::table('leaves')
            ->where('Emp_Id', $id)
            ->where('leavetype',$leavetype)
            ->where('commencingleave',$commence_date)
            ->update(['status' => 'Approved']);

        return back();
    }


    /**
     * Add leave
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function addleave(Request $request){



        $this->validate($request, array(
            'Emp_Id'=> 'required| not_in:0',
            'position'=> 'required',
            'leave_type'=>'required|not_in:0',
            'dept'=>'required',
            'cleave'=>'required',
            'reason'=>'required',

        ));





    if($request['leave_type']=='Casual'){

        $casual_leaves= DB::table('leaves')->where('leavetype', 'Casual')->where('Emp_Id',$request['Emp_Id'])->sum('days');
         if(21 >= $casual_leaves +  $request['nofdayss']  ) {
        Leave::create([
            'Emp_Id' => $request['Emp_Id'],
            'position' => $request['position'],
            'leavetype' => $request['leave_type'],
            'dept' => $request['dept'],
            'commencingleave' => $request['cleave'],
            'reason' => $request['reason'],
            'days' => $request['nofdayss'],
            'status' => 'Pending',

        ]);
        }


    }
        elseif($request['leave_type']=='Vacation'){

            $vacation_leaves= DB::table('leaves')->where('leavetype', 'Vacation')->where('Emp_Id',$request['Emp_Id'])->sum('days');


            if(24 >= $vacation_leaves +  $request['nofdayss']  ) {
                Leave::create([
                    'Emp_Id' => $request['Emp_Id'],
                    'position' => $request['position'],
                    'leavetype' => $request['leave_type'],
                    'dept' => $request['dept'],
                    'commencingleave' => $request['cleave'],
                    'reason' => $request['reason'],
                    'days' => $request['nofdayss'],
                    'status' => 'Pending',

                ]);
            }

        }
        else{
            Leave::create([
                'Emp_Id' => $request['Emp_Id'],
                'position' => $request['position'],
                'leavetype' => $request['leave_type'],
                'dept' => $request['dept'],
                'commencingleave' => $request['cleave'],
                'reason' => $request['reason'],
                'days' => $request['nofdayss'],
                'status' => 'Pending',

            ]);


        }

        Notify::success('successfully Added');
        return back();


    }

    /**
     * Delete leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteleave()
    {
        $id = $_GET['id'];
        $date = $_GET['date'];
        $leave_type = $_GET['leave_t'];

        DB::table('leaves')
            ->where('Emp_Id', $id)
            ->where('commencingleave',$date)
            ->where('leavetype',$leave_type)
            ->delete();


        return back();
    }


    /**
     * Can change leave commence date and resuming date
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateleave(Request $request)
    {

        $this->validate($request, array(
            'nom'=> 'required',
            'lot'=> 'required',

        ));

        $id = $request->id;
        $st = $request->nom;
        $ps = $request->lot;
        $ltype=$request->ltype;



        DB::table('leaves')
            ->where('Emp_Id', $id)
            ->where('leavetype', $ltype)
            ->update(['commencingleave' => $st,'reason'=>$ps]);

        return back();
    }

    public function generatePDF(Request $request){


        $Emp_IDS =DB::table('employes')->lists('id_num');
        $datee = $request->leave_year.'-'.$request->name_month;
        $year=$request->leave_year;
        $monthname = $request->leave_month;
        $LeaveArray = array();
        foreach ($Emp_IDS as $value){
            $employee_name =  DB::table('employes')->where('id_num', $value)->value('fullname');


            $casual_leaves= DB::table('leaves')->where('status', 'Approved')->where('commencingleave','LIKE', '%'.$datee.'%')->where('leavetype', 'Casual')->where('Emp_Id', $value)->sum('days');


            $vacation_leaves=DB::table('leaves')->where('status', 'Approved')->where('commencingleave','LIKE', '%'.$datee.'%')->where('leavetype','Vacation')->where('Emp_Id', $value)->sum('days');

            $others=DB::table('leaves')->where('status', 'Approved')->where('commencingleave','LIKE', '%'.$datee.'%')->where('leavetype', 'Others')->where('Emp_Id',$value)->sum('days');


            array_push($LeaveArray,array($employee_name,$value,$casual_leaves,$vacation_leaves,$others));
        }


        $pdf = PDF::loadView('/HR/reports/Leaves_Report',compact('LeaveArray','year','monthname'));
        return $pdf->download('Leaves_Report.pdf');




    }




}
