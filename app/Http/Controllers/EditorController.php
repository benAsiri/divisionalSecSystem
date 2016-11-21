<?php

namespace App\Http\Controllers;
use App\Employe;
use DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Request;
use UxWeb\SweetAlert;
use Barryvdh\DomPDF\Facade as PDF;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addNote()
    {
        return view('HR.SendNotices.Editor');
    }

    public function store()
    {

    }

//
//    public function generatePDF(Request $request){
//
//        $employee=DB::table('employes')->get();
//        $pdf = PDF::loadView('/HR/reports/employeeRecordsReport',['employee'=>$employee]);
//        return $pdf->download('employee_details_report.pdf');
//    }
//
//
//
//    public function deleteNote($id){
//
//        $employee =  Employe::find($id);
//        $employee->delete();
//        return redirect('LoadEmployeeDetails');
//
//    }

}
