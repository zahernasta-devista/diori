<?php

namespace App\Http\Controllers;

use App\Models\Timelog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\Types\Null_;
use Ramsey\Uuid\Type\Time;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function calendar(Request $request)
    {
        $projects = auth()->user()->projects;

        return view('employee.calendar',compact('projects'));
    }

    public function workLog(Request $request)
    {
        $projects = auth()->user()->projects;

        return view('employee.work-log', compact('projects'));
    }


    public function worklogstore(Request $request)
    {
        $start = strtotime(Carbon::now()->startOfMonth()->format('Y-m-d'));
        $end = strtotime(Carbon::now()->startOfMonth()->addMonth()->format('Y-m-d'));

        $validation = $request->validate([
            'time' => ['required', 'numeric'],
            'project_id' => ['required'],
            'date' => ['required'],
        ]);
        $selectedDate = strtotime($request->date);
        $selectedTime = $request->time;
        $selectedComment = $request->comment;

        if ($request->project_id == '0'){
            return redirect()->to('worklog')->withErrors('Please select a project!');
        }
        if($selectedDate >= $start && $selectedDate <= $end && $selectedTime != 0 && $selectedComment == Null){
            $Timelog = Timelog::create([
                'user_id' => auth()->user()->id,
                'time' => $request->time,
                'project_id' => $request->project_id,
                'date' => $request->date,
                'comment' => "",

            ]);
            return redirect('/calendar');
        }

        if ($selectedDate >= $start && $selectedDate <= $end && $selectedTime != 0 && $selectedComment != NULL)  {
            $Timelog = Timelog::create([
                'user_id' => auth()->user()->id,
                'time' => $request->time,
                'project_id' => $request->project_id,
                'date' => $request->date,
                'comment' => $request->comment,

            ]);
            return redirect('/calendar');

        }


        return redirect('/worklog')->withErrors('Date Must Be From the Current Month!');
    }


    public function employeeProfile()
    {
        return view('employee.employee-profile');
    }

    public function timeSheetResponse(Request $request)
    {
        $sumPerDay = Carbon::parse($request->input('datePicker'));
        $startWeek = Carbon::parse($request->input('datePicker'))->addDays(1)->startOfWeek();
        $endWeek = Carbon::parse($request->input('datePicker'))->addDays(1)->endOfWeek();

        $daySum = DB::table('timelogs')->where('user_id', auth()->user()->id)->whereDay('date', $sumPerDay)->sum('time');
        $weekSum = DB::table('timelogs')->where('user_id', auth()->user()->id)->whereBetween('date', [$startWeek, $endWeek])->sum('time');
        $monthSum = DB::table('timelogs')->where('user_id', auth()->user()->id)->whereMonth('date', $sumPerDay)->sum('time');

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
        return response()->json(['response' => $timeLogsResponse, 'hours' => [$daySum, $weekSum, $monthSum]]);
    }
    public function timeSheetAdd(Request $request){
        $selectedTime = $request->addTime;
        $selectedComment = $request->addComment;

        if ($request->addProject == '0'){
            return redirect()->back();
        }
        if($selectedTime != 0 && $selectedComment == Null){
            $Timelog = Timelog::create([
                'user_id' => auth()->user()->id,
                'time' => $request->addTime,
                'project_id' => $request->addProject,
                'date' => $request->addDate,
                'comment' => "",

            ]);
            return response()->json(['response' =>'timelog added']);
        }
        if ($selectedTime != 0 && $selectedComment != NULL)  {
            $Timelog = Timelog::create([
                'user_id' => auth()->user()->id,
                'time' => $request->addTime,
                'project_id' => $request->addProject,
                'date' => $request->addDate,
                'comment' => $request->addComment,

            ]);
            return response()->json(['response' =>'timelog added']);
        }
    }

    public function timeSheetUpdate(Request $request)
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d');
        $end = Carbon::now()->startOfMonth()->addMonth()->format('Y-m-d');
        $selectedComment = $request->comment;

        if($selectedComment !=NULL){
            $timeLog = Timelog::
            where('id', intval($request->id))
                ->whereBetween('date', [$start, $end])
                ->update(['time' => floatval($request->time), 'comment' => $request->comment]);
        }
        elseif ($selectedComment == NULL){
            $timeLog = Timelog::
            where('id', intval($request->id))
                ->whereBetween('date', [$start, $end])
                ->update(['time' => floatVal($request->time), 'comment' => ""]);
        }


        return response()->json(['response' => "Successfully updated the time log"]);
    }

    public function timeSheetDelete(Request $request)
    {
        $timeLog = Timelog::where('id', intval($request->id))->delete();

        return response()->json(['response' => "Successfully deleted the time log"]);

    }

    public function worklogRestriction(Request $request)
    {
        $timeLogs = Timelog::get()->where('user_id', auth()->user()->id);
        $timeLogsResponse = [];
        foreach ($timeLogs as $timeLog) {
            $timeLogObject = new \stdClass();

            $timeLogObject->id = $timeLog->id;
            $timeLogObject->time = $timeLog->time;
            $timeLogObject->date = $timeLog->date;


            $timeLogsResponse[] = $timeLogObject;
        }
        return response()->json(['timeResponse' => $timeLogsResponse]);
    }
}
