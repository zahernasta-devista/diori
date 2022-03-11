<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Timelog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
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

        $daySum = DB::table('timelogs')->where('user_id', auth()->user()->id)->whereDay('date', $sumPerDay)->whereYear('date',$sumPerDay)->sum('time');
        $weekSum = DB::table('timelogs')->where('user_id', auth()->user()->id)->whereBetween('date', [$startWeek, $endWeek])->sum('time');
        $monthSum = DB::table('timelogs')->where('user_id', auth()->user()->id)->whereMonth('date', $sumPerDay)->whereYear('date',$sumPerDay)->sum('time');
        $allProjects = auth()->user()->projects;

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
        return response()->json(['response' => $timeLogsResponse, 'hours' => [$daySum, $weekSum, $monthSum],'projects'=>$allProjects]);
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
        $selectedProject = $request->addProject;

        $validation = $request->validate([
            'addTime' => ['required', 'numeric'],
            'addProject' => ['required'],
            'addDate' => ['required'],
        ]);

        if ($currentTime == $start) {
            if($selectedProject == 12 && $selectedDate >= $startOfLastMonth && $selectedDate <= $endOfCurrentMonth && $selectedComment == null){
                $Timelog = Timelog::create([
                    'user_id' => auth()->user()->id,
                    'time' => $request->addTime,
                    'project_id' => 12,
                    'date' => $request->addDate,
                    'comment' => "",

                ]);
            }
            if ($selectedDate >= $startOfLastMonth && $selectedDate <= $endOfCurrentMonth && $selectedTime != 0 & $selectedComment == null) {
                $Timelog = Timelog::create([
                    'user_id' => auth()->user()->id,
                    'time' => $request->addTime,
                    'project_id' => $request->addProject,
                    'date' => $request->addDate,
                    'comment' => "",

                ]);
                return response()->json(['response' => 'timelog added']);
            }
            if ($selectedDate >= $startOfLastMonth && $selectedDate <= $endOfCurrentMonth && $selectedTime != 0 & $selectedComment != null) {
                $Timelog = Timelog::create([
                    'user_id' => auth()->user()->id,
                    'time' => $request->addTime,
                    'project_id' => $request->addProject,
                    'date' => $request->addDate,
                    'comment' => $request->addComment,

                ]);
                return response()->json(['response' => 'timelog added']);
            }

        } else {
            if($selectedProject == 12 && $selectedDate >= $startOfLastMonth && $selectedDate <= $endOfCurrentMonth && $selectedComment == null){
                $Timelog = Timelog::create([
                    'user_id' => auth()->user()->id,
                    'time' => $request->addTime,
                    'project_id' => 12,
                    'date' => $request->addDate,
                    'comment' => "",

                ]);
            }
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

    public function extractHistory(Request $request)
    {
        $selectedMonth = $request->input('month');
        $selectedYear = $request->input('year');
        $selectedProject = $request->input('project');
        $selectedEmployee = $request->input('user');

        $projectsOptions = auth()->user()->projects;
        $holidaysTaken = Timelog::where('project_id', 12)->where('user_id',auth()->user()->id)->whereYear('date',Carbon::now()->year)->count();
        $overallSum = Timelog::where('user_id', auth()->user()->id)->whereMonth('date', $request->input('month'))->whereYear('date', $request->input('year'))->sum('time');

        $query = $request->query();
        $userDetails = [];
        if (!isset($query['month']) || !isset($query['year']) || $query['user'] != Auth::user()->id && !isset($query['user'])) {
            return view('employee.extract-history', compact('userDetails','holidaysTaken', 'overallSum', 'projectsOptions','selectedMonth','selectedYear','selectedEmployee','selectedProject'))->withErrors('Please Select The Month And Year Together And Do Not Change The Query!');
        }
        if (isset($query['project'])) {
            $month = $query['month'];
            $year = $query['year'];
            $projectSelected = $query['project'];
            $selectedEmployee = $query['user'];
            $user = User::where('id',intval($selectedEmployee))->first();

            $object = new \stdClass();
            $object->user = $user;
            $object->projects = [];

            $object->hoursWorkedPerMonth = $this->calculateTotalHoursWorked($user->timelogsFromMonthAndYearForEmployeeAndProject($month, $year, $selectedEmployee, $projectSelected));
            $userDetails[] = $object;


            return view('employee.extract-history', compact('holidaysTaken','userDetails', 'user', 'projectsOptions', 'overallSum','selectedMonth','selectedYear','selectedEmployee','selectedProject'));
        }
        if (isset($query['user'])) {
            $month = $query['month'];
            $year = $query['year'];
            $selectedEmployee = $query['user'];
            $user = User::where('id', intval($selectedEmployee))->first();

            $object = new \stdClass();
            $object->user = $user;
            $object->projects = [];
            foreach ($user->projects as $project) {

                $object->projects[$project->name] = $this->calculateTotalHoursWorked($project->timelogsFromMonthAndYearForEmployee($month, $year, $selectedEmployee));
            }
            $object->hoursWorkedPerMonth = $this->calculateTotalHoursWorked($user->timelogsFromMonthAndYear($month, $year));
            $userDetails[] = $object;


            return view('employee.extract-history', compact('holidaysTaken','userDetails', 'user', 'projectsOptions', 'overallSum','selectedMonth','selectedYear','selectedEmployee','selectedProject'));
        }
    }
    private function calculateTotalHoursWorked($timelogs): float
    {
        $sumOfHoursWorked = 0;
        foreach ($timelogs as $timelog) {
            $sumOfHoursWorked += $timelog->time;
        }

        return $sumOfHoursWorked;
    }
}
