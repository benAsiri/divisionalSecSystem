<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Deed;

class DeedController extends Controller
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
        $deeds =DB::table('deeds')->get();


        return view('/Land/Deed/deed',compact('deeds'));
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
            'deed_no'=> 'required',
            'deed_type'=> 'required|not_in:0',
            'extent'=>'required',
            'deed_owner'=>'required',
            'present_owner'=>'required',
            'nominee'=>'required',
            'refe'=>'required|not_in:0',

        ));


            $id = $request['refe'];
        $count = DB::table('deeds')
            ->where('reference_no', $id)
            ->count();

        if( $count == 0) {
            Deed::create([
                'deed_no' => $request['deed_no'],
                'deed_type' => $request['deed_type'],
                'extent' => $request['extent'],
                'deed_owner' => $request['deed_owner'],
                'present_owner' => $request['present_owner'],
                'nominee' => $request['nominee'],
                'reference_no' => $request['refe'],


            ]);
        }
        else{

        }

        return back();
    }

    public function update(Request $request)

    {

        $this->validate($request, array(
            'no'=> 'required',
            'dt'=> 'required',
            'extent'=>'required',
            'nominee'=>'required',
            'down'=>'required',
            'pown'=>'required',
            'refe'=>'required',

        ));

        $id = $request->no;
        $dt = $request->dt;
        $extent = $request->extent;
        $down = $request->down;
        $pown = $request->pown;
        $nominee = $request->nominee;
        $refe=$request->refe;


        $id = $request->refe;
        $count = DB::table('deeds')
            ->where('reference_no', $id)
            ->count();

        if( $count == 0) {

            DB::table('deeds')
                ->where('deed_no', $id)
                ->update(['deed_type' => $dt, 'deed_owner' => $down, 'extent' => $extent, 'present_owner' => $pown, 'nominee' => $nominee, 'reference_no' => $refe]);
        }

        return back();
    }


    public function delete(Request $request)
    {
        $id = $request->no;

        DB::table('deeds')
            ->where('deed_no', $id)
            ->delete();

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
