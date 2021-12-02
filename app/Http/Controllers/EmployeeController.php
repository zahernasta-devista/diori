<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
        return view('employee.work-log',compact('projects'));
    }

   
  

    public function worklogstore(Request $request) {
       Log::info("message"); 
        $request->validate([
            'time' => ['required'],
            'project_id' => ['required'],
            'date' => ['required'],
           
        ]);
            
        $Timelog = Timelog::create([
            'user_id' =>auth()->user()->id,
            'time' => $request->time,
            'project_id' => $request->project_id,
            'date' => $request->date,

           
        ]);
        
        $Timelog->save();

    }
 

    public function employeeProfile()
    {
        return view('employee.employee-profile');
    }
}
