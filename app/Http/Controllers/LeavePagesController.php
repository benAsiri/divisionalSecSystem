<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LeavePagesController extends Controller
{
<<<<<<< HEAD
    //leaves
    public function ApplyMyLeave()
    {
=======
    public function __construct()
    {
        $this->middleware('auth');
    }
    //leaves
    public function ApplyMyLeave()
    {



>>>>>>> 9433c531a44c6f164c418979d3209923dfbd288e
        return view('HR.LeaveManage.applyLeaves');
    }

    public function CurrentLeaves()
    {
        return view('HR.LeaveManage.currentleaves');
    }

}
