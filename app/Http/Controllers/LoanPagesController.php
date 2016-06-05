<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoanPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function applyLoans()
    {
       // $loans = DB::table('')->get();

        return view('HR.loans.applyLoans');
    }

    public function viewLoans()
    {
        return view('HR.loans.viewLoans');
    }
}
