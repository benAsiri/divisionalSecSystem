<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Leave;


class LeaveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(){
        $employees =DB::table('employes')->get();
        $leaves =DB::table('leaves')->get();

        return view('HR/LeaveManage/applyleavess',compact('leaves','employees'));


    }

    public function indexforHead(){

        $leaves =DB::table('leaves')->where('status', 'pending')->get();

        return view('HR/leavesopinions',compact('leaves'));


    }

    protected function Reject()
    {
        $id = $_GET['id'];

        DB::table('leaves')
            ->where('Emp_Id', $id)
            ->update(['status' => 'Rejected']);

        return back();
    }

    protected function Approve()
    {

        $id = $_GET['id'];

        DB::table('leaves')
            ->where('Emp_Id', $id)
            ->update(['status' => 'Approved']);

        return back();
    }



    protected function addleave(Request $request){

        $this->validate($request, array(
            'Emp_Id'=> 'required',
            'position'=> 'required',
            'leave_type'=>'required',
            'dept'=>'required',
            'cleave'=> 'required|date',
            'rleave'=>'required|date',
            'reason'=>'required',

        ));


        Leave::create([
            'Emp_Id' => $request['Emp_Id'],
            'position' => $request['position'],
            'leavetype' => $request['leave_type'],
            'dept' => $request['dept'],
            'commencingleave' => $request['cleave'],
            'resumingduties' => $request['rleave'],
            'reason' => $request['reason'],
            'status' => 'Pending',

        ]);

        return back();
    }

    public function deleteleave()
    {
        $id = $_GET['id'];

        DB::table('leaves')
            ->where('Emp_Id', $id)
            ->delete();

        return back();
    }



    protected function updateleave()
    {

        $id = $_GET['id'];
        $st = $_GET['commence'];
        $ps = $_GET['resume'];
        $rss= $_GET['reason'];


        DB::table('leaves')
            ->where('Emp_Id', $id)
            ->update(['commencingleave' => $st, 'resumingduties' => $ps,'reason'=>$rss]);

        return back();
    }




}
