<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Leave;
use App\leaves_remain;

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

    /**
     * Put pending request to the head of the office
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexforHead(){

        $leaves =DB::table('leaves')->where('status', 'pending')->get();

        return view('HR/leavesopinions',compact('leaves'));


    }

    protected function remaining(){




        return 'kusal';

    }

    /**
     * Reject leave
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function Reject()
    {
        $id = $_GET['id'];

        DB::table('leaves')
            ->where('Emp_Id', $id)
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

        DB::table('leaves')
            ->where('Emp_Id', $id)
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
            'Emp_Id'=> 'required',
            'position'=> 'required',
            'leave_type'=>'required',
            'dept'=>'required',

            'reason'=>'required',

        ));



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

        return back();
    }

    /**
     * Delete leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteleave()
    {
        $id = $_GET['id'];

        DB::table('leaves')
            ->where('Emp_Id', $id)
            ->delete();

        return back();
    }


    /**
     * Can change leave commence date and resuming date
     * @return \Illuminate\Http\RedirectResponse
     */
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
