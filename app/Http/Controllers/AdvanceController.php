<?php

namespace App\Http\Controllers;

use App\AdvanceProgram;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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
        $this->validate($request, array(
            'name'=> 'required',
            'eid'=> 'required',
            'handovergate'=>'required',
            'approveddate'=>'required',
            'status'=> 'required',

        ));

            $program = new AdvanceProgram();

            $program->emp_id = $request->eid;
            $program->Duty = $request->name;
            $program->handOverDate = $request->handoverdate;
            $program->approvedDate = $request->approveddate;
            $program->Status = $request->current_status;

            $program->save();
        return $program;

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

        $ad_pro->Duty = $request->name;
        $ad_pro->emp_id = $request->eid;
        $ad_pro->handOverDate = $request->handoverdate;
        $ad_pro->approvedDate = $request->approveddate;
        $ad_pro->Status = $request->current_status;

        $ad_pro->update();

        return back();

    }

    /**
     * Generate PDF file and display for current month
     * @param Request $request
     */
    public function generatePDF(Request $request){
        $data = AdvanceProgram::where( DB::raw('MONTH(created_at)'), '=', date('n') )->get();
        $pdf = PDF::loadView('reports/monthlyReport',['advance_pro'=>$data]);
        return $pdf->download('monthly-report.pdf');
    }
}
