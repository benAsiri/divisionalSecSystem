<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoanPagesController extends Controller
{
    //loan Controller

    public function applyLoans()
    {
        $loans = DB::table('')->get();
        return view('HR.loans.applyLoans');
    }

    public function viewLoans()
    {
        return view('HR.loans.viewLoans');
    }
}
