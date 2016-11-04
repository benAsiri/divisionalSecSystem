<?php
/**
 * Created by PhpStorm.
 * User: Asi
 * Date: 10/15/2016
 * Time: 5:52 PM
 */

namespace App\Http\Controllers;
use App\Mleave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade as PDF;

class MleavesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Add Maternity Leaves
    public function addMleaves()
    {
        $Ids = DB::table('employes')-> where ('gender','Female')->get();
        return view('HR.LeaveManage.Mleaves.AddNewMleaves',compact('Ids'));
    }

    public function viewMleaves()
    {
        $mleaves=DB::table('Mleaves')->get();
        return view('HR.LeaveManage.Mleaves.viewMleaves',compact('mleaves'));
    }

    public function addMleavesDetails()
    {
        if(Input::ajax()) {
            $data = Input::all();
            $endLeaveDate = "";

            if($data['noOfChilds'] == 1){
                $endLeaveDate = Carbon::now()->addDays(84)->toDateString();
            }
            else{
                $endLeaveDate = Carbon::now()->addDays(42)->toDateString();
            }
            $mleaves=new Mleave();
            $mleaves->Emp_Id=$data['Emp_Id'];
            $mleaves->chkMedicalCertificate=$data['chkMedicalCertificate'];
            $mleaves->chkChildBirthCertificate=$data['chkChildBirthCertificate'];
            $mleaves->StartLeaveDate= Carbon::now();
            $mleaves->EndLeaveDate= $endLeaveDate;
            $mleaves->reason=$data['reason'];
            $mleaves->noOfChilds=$data['noOfChilds'];
            $mleaves->status=$data['status'];
            $mleaves->save();
        return $data;

        }
    }


    public function generatePDF(Request $request){
        $mleaves = DB:: table('mleaves')->get();
        $pdf = PDF::loadView('/HR/reports/MateneryLeavesRecords', ['mleaves'=>$mleaves]);
        return $pdf->download('Matenery_Leaves_Records.pdf');
    }


    public function UpdateMleavesDetails(Request $request){
        $mleaves = Mleave::find($request ['index']);
        echo $request['chkMC'];
        $mleaves ->StartLeaveDate=$request['datepicker_SLeaveDate'];
        $mleaves ->chkMedicalCertificate = $request['chkMC'];
        $mleaves ->EndLeaveDate=$request['datepicker_LeaveDate'];
        $mleaves ->reason=$request['Reasons'];
        $mleaves ->status=$request['Lstatus'];
        $mleaves-> save();

        return redirect()->action('MleavesController@loadUpdateMleaves');


    }

    public function deleteMleaves(Request $request){
        $mleaves = Mleave::find($request['id']);
        $mleaves->delete();
        return redirect()->action('MleavesController@loadUpdateMleaves');
    }

    public function loadUpdateMleaves(){
        $mleaves = DB::table('mleaves')->get();
        return view('HR.LeaveManage.Mleaves.UpdateMleavesDetails')->with('mleaves',$mleaves);
    }
}