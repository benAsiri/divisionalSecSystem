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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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

}