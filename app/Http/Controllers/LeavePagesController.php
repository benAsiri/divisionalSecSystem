<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LeavePagesController extends Controller
{
    //leaves
    public function ApplyMyLeave()
    {
        return view('HR.LeaveManage.applyLeaves');
    }

    public function CurrentLeaves()
    {
        return view('HR.LeaveManage.currentleaves');
    }

}
