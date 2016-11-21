<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LDO_Permit;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;
use Alert;
use Andheiberg\Notify\Facades\Notify;


class LDOPermitController extends Controller
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
        $ldo_permits =DB::table('l_d_o__permits')->get();


        return view('/Land/LDO/ldo_permits',compact('ldo_permits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'permit_no'=> 'required',
            'gs_division'=> 'required|not_in:0',
            'name_of_village'=>'required|alpha|max:30',
            'name_of_land'=>'required|alpha|max:30',
            'permit_holder_name'=>'required|alpha|max:100',
            'extent'=>'required|numeric|max:50',
            'unit'=>'required|not_in:0',
            'present_owner'=>'required|alpha|max:100',
            'present_situation'=>'required|alpha|max:30'

        ));

        $redudnt = DB::table('l_d_o__permits')->where('permit_no',$request['permit_no'])->get();

        if( $redudnt != null){


            Notify::warning('LDO Permit Already Added to the system!');

            return back();


        }
        else {



            $extent = $request['extent'] . " " . $request['unit'];

            LDO_Permit::create([
                'permit_no' => $request['permit_no'],
                'GS_division' => $request['gs_division'],
                'name_of_village' => $request['name_of_village'],
                'name_of_land' => $request['name_of_land'],
                'permit_holder_name' => $request['permit_holder_name'],
                'extent' => $extent,
                'present_owner' => $request['present_owner'],
                'present_situation' => $request['present_situation'],
                'cancellation' => 'No'

            ]);



            Notify::success('LDO Permit Added!');
            
            return back();

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->no;
        $gs = $request->gs;
        $village = $request->village;
        $land = $request->land;
        $holder_name = $request->holder_name;
        $extent = $request->extent;
        $powner = $request->powner;
        $present_situ = $request->prsnt_situ;
        $cancellation=$request->cancel;

        DB::table('l_d_o__permits')
            ->where('permit_no', $id)
            ->update(['GS_division' => $gs, 'name_of_village' => $village,'name_of_land' => $land,'permit_holder_name' => $holder_name,'extent' => $extent,'present_owner' => $powner,'present_situation' => $present_situ,'cancellation'=>$cancellation]);

       
        Notify::success('LDO Permit successfully updated!');
        
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->no;

        DB::table('l_d_o__permits')
            ->where('permit_no', $id)
            ->delete();

        
        Notify::success('LDO Permit successfully deleted!');
        
        return back();


    }
}
