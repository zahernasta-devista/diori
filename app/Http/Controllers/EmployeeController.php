<?php

namespace App\Http\Controllers;

use App\Models\Timelog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Type\Time;

class EmployeeController extends Controller
{
    public function calendar(Request $request)
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
        $validation = $request->validate([
            'time' => ['required','numeric','between:1, 12'],
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

    public function timeSheetResponse(Request $request){
        $timeLogs = Timelog::get()->where('user_id', auth()->user()->id);
        $timeLogsResponse = [];
        foreach ($timeLogs as $timeLog) {
            $timeLogObject = new \stdClass();

            $timeLogObject->id = $timeLog->id;
            $timeLogObject->projectName = $timeLog->project->name;
            $timeLogObject->time = $timeLog->time;
            $timeLogObject->date = $timeLog->date;
            $timeLogObject->comment = $timeLog->comment;


            $timeLogsResponse[] = $timeLogObject;
        }
        return response()->json(['response' => $timeLogsResponse]);
    }
    public function timeSheetUpdate(Request $request)
    {
        $timeLog = Timelog::where('id', intval($request->id))->update(['time' => intval($request->time),'comment'=>$request->comment]);


         return response()->json(['response' => "Successfully updated the time log"]);
    }

    public function timeSheetDelete(Request $request){
        $timeLog = Timelog::where('id',intval($request->id))->delete();

        return response()->json(['response' => "Successfully deleted the time log"]);

    }
}
