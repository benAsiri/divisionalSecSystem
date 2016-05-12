<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function n()
    {
        return view('starter');
    }


    public function addEmployee()
    {
        return view('HR.employee.newEmployee');
    }

    public function yearly_Increment_Calculator()
    {
        return view('HR.yearly_Increment_Calc.yearly_Increment_cal');
    }

    public function Page1()
    {
        return view('HR.yearly_Increment_Calc.YICPage1');
    }

    public function Page2()
    {
        return view('HR.yearly_Increment_Calc.YICPage2');
    }

    public function Page3()
    {
        return view('HR.yearly_Increment_Calc.YICPage3');
    }

     public function Loans()
    {
        return view('HR.loans.applyLoans');
    }

     public function maternityLeaves()
    {
        return view('HR.mLeaves.applyMaternityLeaves');
    }



}


