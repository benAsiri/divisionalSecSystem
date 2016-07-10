<?php

namespace App\Http\Controllers;

use App\AdvanceProgram;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

//use Validator;

class AdvanceController extends Controller
{
    public function AdvanceProgram(Request $request)
    {
        return view('HR/AdvanceProgram/AdvanceTable');
    } //

    public function InsertInfo(Request $request)
    {
        return view('HR/AdvanceProgram/InsertInfo');
    }

    public function add_Programs(Request $request)
    {


            $program = new AdvanceProgram();

            $program->name = $request->name;
            $program->emp_id = $request->eid;
            $program->handOverDate = $request->handoverdate;
            $program->approvedDate = $request->approveddate;
            $program->Status = $request->current_status;

            $program->save();

            return back();

    }
    public function Delete_Data(AdvanceProgram $ad_pro)
    {
        $ad_pro->delete();
        return back();
    }

    public function show(){

        $advance_pro = AdvanceProgram::all();
        return view('HR/AdvanceProgram/AdvanceTable',compact('advance_pro'));

    }

    public function edit_data(AdvanceProgram $ad_pro){

        return view('HR/AdvanceProgram/editInfo',compact('ad_pro'));

    }

    public function update_data(Request $request,AdvanceProgram $ad_pro){

        $ad_pro->name = $request->name;
        $ad_pro->emp_id = $request->eid;
        $ad_pro->handOverDate = $request->handoverdate;
        $ad_pro->approvedDate = $request->approveddate;
        $ad_pro->Status = $request->current_status;

        $ad_pro->update();

        return back();

    }
}
