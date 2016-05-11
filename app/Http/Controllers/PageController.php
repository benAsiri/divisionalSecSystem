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
}


