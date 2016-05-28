<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HRController extends Controller
{
    //
    public function addEmployee()
    {
        return view('HR.employee.newEmployee');
    }

}
