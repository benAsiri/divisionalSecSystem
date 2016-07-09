<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoanPagesController extends Controller
{
<<<<<<< HEAD
    //loan Controller

    public function applyLoans()
    {
        $loans = DB::table('')->get();
=======
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function applyLoans()
    {
       // $loans = DB::table('')->get();

>>>>>>> 9433c531a44c6f164c418979d3209923dfbd288e
        return view('HR.loans.applyLoans');
    }

    public function viewLoans()
    {
        return view('HR.loans.viewLoans');
    }
}
