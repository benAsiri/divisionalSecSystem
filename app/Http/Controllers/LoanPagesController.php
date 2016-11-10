<?php

namespace App\Http\Controllers;
use App\Loans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade as PDF;


use App\Http\Requests;

class LoanPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function viewLoans()
    {
        $loans=DB::table('loans')->get();
        return view('HR.LoanRequests.viewLoans',compact('loans'));
    }

    public function generatePDF(Request $request){
        $loans = DB:: table('loans')->get();
        $pdf = PDF::loadView('/HR/reports/LoanRecords', ['loans'=>$loans]);
        return $pdf->download('Loan_Records.pdf');
    }


    public function addLoan()
    {
        $Ids = DB::table('employes')->get();
        return view('HR.LoanRequests.AddNewLoanRequests',compact('Ids'));
    }


    //AddLoans Fill Combo Box
    public function fillLoanDetails()
    {
        $data = Input::all();
        $Ids = DB::table('employes')->where ('id_num',$data['id_num'])->get();
        return $Ids;
    }





    public function loadUpdateLoan(){
        $loans = DB::table('loans')->get();
        var_dump($loans);
        return view('HR.LoanRequests.UpdateLoanRequests')->with('loans',$loans);
    }


    public function UpdateLoanDetails(Request $request){
        $loans = Loans::find($request ['index']);
        $loans ->Loan_request_date=$request['datepicker_LoanReqDate'];
        $loans ->Ldoc = $request['Lfile'];
        $loans ->Special_notes=$request['Lnotes'];
        $loans-> save();

        return redirect()->action('LoanPagesController@loadUpdateLoan');
    }


    public function addLoanDetails()
    {
        if (Input::ajax()) {
            $data = Input::all();
            $loans = new Loans();
            $loans->Emp_Id = $data['empIDload'];
            $loans->Emp_Name = $data['Lname'];
            $loans->Emp_Pos = $data['Lposition'];
            $loans->Emp_Grade = $data['Ljgrade'];
            $loans->Loan_request_date = $data['datepicker_LoanReqDate'];
            $loans = Input::file('Lfile')->getClientOriginalExtension();
            $loans->Special_notes = $data['Lnotes'];
            $loans->save();

            return $loans;
        }
    }

    public function deleteLoan(Request $request){
        $loans = Loans::find($request['id']);
        $loans-> delete();
        return redirect()->action('LoanPagesController@loadUpdateLoan');
    }


}
