<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MiddleClass;

use App\Http\Requests;
use Codecourse\Notify\Facades\Notify;

class MiddleClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mclass =DB::table('middle_classes')->get();


        return view('/Land/MiddleClass/middleclass',compact('mclass'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
        $this->validate($request, array(
            'plan_no'=> 'required|not_in:0',
            'lot_no'=> 'required|max:10000',
            'file_no'=>'required|max:10000',
            'unit'=>'required|not_in:0',
            'type'=>'required|numeric|max:10000',
            'gs_division'=>'required|not_in:0',
            'issue_date'=>'required',
            'extent'=>'required|numeric|max:500',
            'owner_name'=>'required|alpha|max:30',
            'present_owner'=>'required|alpha|max:30',
            'present_situation'=>'required|not_in:0',
            'nominee'=>'required|alpha|max:30',
            'transfer'=>'required|alpha|max:30'

        ));


        $count_middle_classes = DB::table('middle_classes')->where('lot_no',$request['lot_no'])->count();


        if($count_middle_classes ==0) {


            $typee = $request['unit'] . " " . $request['type'];

            MiddleClass::create([
                'plan_no' => $request['plan_no'],
                'lot_no' => $request['lot_no'],
                'file_no' => $request['file_no'],
                'grant' => $typee,
                'gs' => $request['gs_division'],
                'issue_date' => $request['issue_date'],
                'extent' => $request['extent'],
                'owner' => $request['owner_name'],
                'present_owner' => $request['present_owner'],
                'present_situ' => $request['present_situation'],
                'nominee' => $request['nominee'],
                'transfer' => $request['transfer'],


            ]);

            notify()->flash('Middle Class Permit added!', 'success');

        }

        else{

            notify()->flash('Middle class permit already in!', 'warning');

        }


        return back();
    }

    public function update(Request $request)
    {

        $this->validate($request, array(
            'no'=> 'required',
            'lot'=> 'required',
            'file'=>'required',
            'gs'=>'required',
            'type_grant'=>'required',


        ));


            $id = $request->no;
            $lot = $request->lot;
            $file = $request->file;
            $gs = $request->gs;
            $type_grant = $request->type_grant;
            $date = $request->date;
            $extent=$request->extent;
            $oname = $request->oname;
            $powner = $request->powner;
            $situ = $request->situ;
            $nominee=$request->nominee;
            $transfer=$request->transfer;




            DB::table('middle_classes')
                ->where('lot_no',$lot)
                ->update(['plan_no' => $id, 'file_no' => $file, 'gs' => $gs, 'issue_date' => $date,'grant'=>$type_grant, 'owner' => $oname, 'extent' => $extent, 'present_owner' => $powner,'present_situ' => $situ, 'nominee' => $nominee, 'transfer' => $transfer]);


        notify()->flash('Middle Class Permit has been updated!', 'success');

        return back();
    }


    public function delete(Request $request)
    {
        $type_grant = $request->typee;

        $no = $request->no;
        $lotno = $request->lot_no;
        $fileno = $request->file_no;



        DB::table('middle_classes')
            ->where('grant',$type_grant )
            ->where('lot_no',$lotno )
            ->where('plan_no',$no )
            ->where('file_no',$fileno )
            ->delete();


        notify()->flash('Middle Class Permit has been deleted!', 'success');
        return back();


    }

    public function getldo(){

        $deeds =DB::table('l_d_o__permits')->lists('permit_no');

        return $deeds;
    }

    public function getldo_details(Request $request){

        $id = $request->id;

        $extent = DB::table('l_d_o__permits')->where('permit_no',$id)->value('extent');

        $present_owner = DB::table('l_d_o__permits')->where('permit_no',$id)->value('present_owner');

        return array($extent,$present_owner);


    }
}
