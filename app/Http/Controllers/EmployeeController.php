<?php

namespace App\Http\Controllers;

use App\Models\Timelog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function calendar(Request $request)
    {
        $projects = auth()->user()->projects;

        return view('employee.calendar', compact('projects'));
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
            $timeLogObject->projectId = $timeLog->project->id;
            $timeLogObject->time = $timeLog->time;
            $timeLogObject->date = $timeLog->date;
            $timeLogObject->comment = $timeLog->comment;


            $timeLogsResponse[] = $timeLogObject;
        }
        return response()->json(['response' => $timeLogsResponse, 'hours' => [$daySum, $weekSum, $monthSum]]);
    }

    public function timeSheetAdd(Request $request)
    {
        $start = strtotime(Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endOfCurrentMonth = strtotime(Carbon::now()->endOfMonth()->format('Y-m-d'));
        $startOfLastMonth = strtotime(Carbon::now()->startOfMonth()->subMonth()->format('Y-m-d'));
        $end = strtotime(Carbon::now()->startOfMonth()->addMonth()->format('Y-m-d'));
        $currentTime = strtotime(Carbon::now()->format("Y-m-d"));

        $selectedDate = strtotime($request->addDate);
        $selectedTime = $request->addTime;
        $selectedComment = $request->addComment;

        $validation = $request->validate([
            'addTime' => ['required', 'numeric'],
            'addProject' => ['required'],
            'addDate' => ['required'],
        ]);

        if ($currentTime == $start) {
            if($selectedDate >= $startOfLastMonth && $selectedDate<=$endOfCurrentMonth && $selectedTime != 0 & $selectedComment == null){
                $Timelog = Timelog::create([
                    'user_id' => auth()->user()->id,
                    'time' => $request->addTime,
                    'project_id' => $request->addProject,
                    'date' => $request->addDate,
                    'comment' => "",

                ]);
                return response()->json(['response' => 'timelog added']);
            }
            if($selectedDate >= $startOfLastMonth && $selectedDate<=$endOfCurrentMonth && $selectedTime != 0 & $selectedComment != null){
                $Timelog = Timelog::create([
                    'user_id' => auth()->user()->id,
                    'time' => $request->addTime,
                    'project_id' => $request->addProject,
                    'date' => $request->addDate,
                    'comment' => $request->addComment,

                ]);
                return response()->json(['response' => 'timelog added']);
            }

        }
        else{
            if ($selectedDate >= $start && $selectedDate <= $end && $selectedTime != 0 && $selectedComment == Null) {
                $Timelog = Timelog::create([
                    'user_id' => auth()->user()->id,
                    'time' => $request->addTime,
                    'project_id' => $request->addProject,
                    'date' => $request->addDate,
                    'comment' => "",

                ]);
                return response()->json(['response' => 'timelog added']);
            }
            if ($selectedDate >= $start && $selectedDate <= $end && $selectedTime != 0 && $selectedComment != Null) {
                $Timelog = Timelog::create([
                    'user_id' => auth()->user()->id,
                    'time' => $request->addTime,
                    'project_id' => $request->addProject,
                    'date' => $request->addDate,
                    'comment' => $request->addComment,

                ]);
                return response()->json(['response' => 'timelog added']);
            }
        }

    }

    public function timeSheetUpdate(Request $request)
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d');
        $end = Carbon::now()->startOfMonth()->addMonth()->format('Y-m-d');
        $selectedComment = $request->comment;
        if ($selectedComment != NULL) {
            $timeLog = Timelog::
            where('id', intval($request->id))
                ->whereBetween('date', [$start, $end])
                ->update(['time' => floatval($request->time), 'comment' => $request->comment, 'project_id' => $request->project]);
        } elseif ($selectedComment == NULL) {
            $timeLog = Timelog::
            where('id', intval($request->id))
                ->whereBetween('date', [$start, $end])
                ->update(['time' => floatVal($request->time), 'comment' => "", 'project_id' => $request->project]);
        }


        return response()->json(['response' => "Successfully updated the time log"]);
    }

    public function updateDateOfTimeLog(Request $request)
    {

        $positionOfDrop = $request->calendarDatePosition;
        $timeLog = Timelog::
        where('id', intval($request->idOfDrop))
            ->update(['date' => $positionOfDrop]);

        return response()->json(['response' => "Date modified successfully"]);
    }

    public function timeSheetClone(Request $request)
    {
        $start = strtotime(Carbon::now()->startOfMonth()->format('Y-m-d'));
        $end = strtotime(Carbon::now()->startOfMonth()->addMonth()->format('Y-m-d'));
        $selectedDate = strtotime($request->calendarDatePosition);
        $selectedTime = $request->cloneTime;
        $selectedComment = $request->cloneComment;


        if ($request->addProject == '0') {
            return redirect()->back();
        }
        if ($selectedDate >= $start && $selectedDate <= $end && $selectedTime != 0 && $selectedComment == Null) {
            $Timelog = Timelog::create([
                'user_id' => auth()->user()->id,
                'time' => $request->cloneTime,
                'project_id' => intval($request->cloneProject),
                'date' => $request->calendarDatePosition,
                'comment' => "",

            ]);
            return response()->json(['response' => 'timelog cloned']);
        }
        if ($selectedDate >= $start && $selectedDate <= $end && $selectedTime != 0 && $selectedComment != Null) {
            $Timelog = Timelog::create([
                'user_id' => auth()->user()->id,
                'time' => $request->cloneTime,
                'project_id' => intval($request->cloneProject),
                'date' => $request->calendarDatePosition,
                'comment' => $request->cloneComment,

            ]);
            return response()->json(['response' => 'timelog cloned']);
        }
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
