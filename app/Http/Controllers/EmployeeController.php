<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function calendar()
    {
        return view('employee.calendar');
    }

    public function dashboardEmployee()
    {
        return view('employee.dashboard-employee');
    }
    public function workLog()
    {
        return view('employee.work-log');
    }


    public function employeeProfile()
    {
        return view('employee.employee-profile');
    }
}
