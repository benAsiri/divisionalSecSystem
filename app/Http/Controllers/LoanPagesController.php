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
            $loans->Emp_Id = $data['Emp_Id'];
            $loans->Emp_Name = $data['Emp_Name'];
            $loans->Emp_Pos = $data['Emp_Pos'];
            $loans->Emp_Grade = $data['Emp_Grade'];
            $loans->Loan_request_date = $data['Loan_request_date'];
            $loans->Ldoc = $data['Ldoc'];
            $loans->Special_notes = $data['Special_notes'];
            $loans->save();
            return $data;
        }
    }

    public function deleteLoan(Request $request){
        $loans = Loans::find($request['id']);
        $loans-> delete();
        return redirect()->action('LoanPagesController@loadUpdateLoan');
    }


}
