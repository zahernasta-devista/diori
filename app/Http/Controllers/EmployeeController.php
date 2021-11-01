<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function calendar2()
    {
        return view('employee.calendar2');
    }

    public function index2()
    {
        return view('employee.index2');
    }
    public function workLog()
    {
        return view('employee.work-log');
    }
    public function index4()
    {
        return view('employee.index4');
    }
    public function index5()
    {
        return view('employee.index5');
    }
    public function employeeProfile()
    {
        return view('employee.employee-profile');
    }
}
