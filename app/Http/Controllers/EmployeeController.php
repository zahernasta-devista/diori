<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timelog;


class EmployeeController extends Controller
{
    //
    public function calendar()
    {
        return view('employee.calendar');
    }

    public function workLog(Request $request)
    {
        $projects = auth()->user()->projects;
        return view('employee.work-log', compact('projects'));
    }




    public function worklogstore(Request $request)
    {
        $request->validate([
            'time' => ['required'],
            'project_id' => ['required'],
            'date' => ['required'],

        ]);

        $Timelog = Timelog::create([
            'user_id' => auth()->user()->id,
            'time' => $request->time,
            'project_id' => $request->project_id,
            'date' => $request->date,


        ]);

        $Timelog->save();
        return redirect('/worklog');
    }


    public function employeeProfile()
    {
        return view('employee.employee-profile');
    }
}
