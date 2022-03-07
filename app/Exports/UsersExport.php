<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Project;
use App\Models\Timelog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use  App\Http\Controllers\AdminController;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{

    private $year;
    private $month;
    private $project_id;
    private $user_id;

    public function __construct($year, $month, $project_id, $user_id)
    {
        $this->year = $year;
        $this->month = $month;
        $this->project_id = $project_id;
        $this->user_id = $user_id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->project_id == "") {

            if ($this->user_id != "") {
//                just employee
                return Timelog::select(['users.name as user_name', 'users.email', 'projects.name as project_name', 'time', 'date', 'comment'])
                    ->where('user_id', $this->user_id)
                    ->whereMonth('date', $this->month)
                    ->whereYear('date', $this->year)
                    ->join('projects', 'timelogs.project_id', '=', 'projects.id')
                    ->join('users', 'timelogs.user_id', '=', 'users.id')
                    ->orderBy('date')
                    ->get();

            }
            //no selection
            return Timelog::select(['users.name as user_name', 'users.email', 'projects.name as project_name', 'time', 'date', 'comment'])
                ->whereMonth('date', $this->month)
                ->whereYear('date', $this->year)
                ->join('projects', 'timelogs.project_id', '=', 'projects.id')
                ->join('users', 'timelogs.user_id', '=', 'users.id')
                ->orderBy('date')
                ->get();

        } elseif ($this->project_id != "" && $this->user_id != "") {
//both where selected
            return Timelog::select(['users.name as user_name', 'users.email', 'projects.name as project_name', 'time', 'date', 'comment'])
                ->where('user_id', $this->user_id)
                ->where('project_id', $this->project_id)
                ->whereMonth('date', $this->month)
                ->whereYear('date', $this->year)
                ->join('projects', 'timelogs.project_id', '=', 'projects.id')
                ->join('users', 'timelogs.user_id', '=', 'users.id')
                ->orderBy('date')
                ->get();
        } else {
            // a project was selected
            return Timelog::select(['users.name as user_name', 'users.email', 'projects.name as project_name', 'time', 'date', 'comment'])
                ->where('project_id', $this->project_id)
                ->whereMonth('date', $this->month)
                ->whereYear('date', $this->year)
                ->join('projects', 'timelogs.project_id', '=', 'projects.id')
                ->join('users', 'timelogs.user_id', '=', 'users.id')
                ->orderBy('date')
                ->get();

        }
    }


    public function headings(): array
    {
        return ["User Name", "User Email", "Project Name", "Time Allocated", "Date Logged", "TimeLog Comment"];
    }
}
