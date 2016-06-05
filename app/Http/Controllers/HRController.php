<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Str;
use DB;

class HRController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function addEmployee()
    {
        return view('HR.employee.newEmployee');
    }

    public function searchEmployee()
    {
        $employee=DB::table('employes')->get();
        return view('HR.employee.searchEmployee',compact('employee'));
    }





}
