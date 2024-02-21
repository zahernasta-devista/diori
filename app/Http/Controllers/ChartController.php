<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Timelog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ChartController extends Controller
{
    public function EmployeeHoursPerProjectChart(): JsonResponse
    {
        $user = auth()->user();
        $projectsOptions = $user->projects;

        $currentMonth = Carbon::now()->month;

        $data = [
            'labels' => [],
            'data' => [],
        ];

        foreach ($projectsOptions as $project) {
            if ($project->name === 'Holidays') {
                continue;
            }
            $totalHours = $user->timelogs()
                ->where('project_id', $project->id)
                ->whereMonth('created_at', $currentMonth)
                ->sum('time');

            $data['projectName'][] = $project->name;
            $data['projectHours'][] = $totalHours;
        }

        return response()->json(['projects' => $data]);
    }


    public function EmployeeHoursPerMonthChart(Request $request): JsonResponse
    {
        try {
            $user = auth()->user();
            $totalHoursPerMonth = array_fill(1, 12, 0);
            $currentYear = Carbon::now()->year;

            for ($month = 1; $month <= 12; $month++) {
                $overallSum = Timelog::where('user_id', $user->id)
                    ->whereMonth('date', $month)
                    ->whereYear('date', $currentYear)
                    ->sum('time');

                $totalHoursPerMonth[$month] = $overallSum;
            }

            $overallHoursPerMonthData = array_values($totalHoursPerMonth);

            return response()->json(['overallHoursPerMonthData' => $overallHoursPerMonthData]);
        } catch (\Exception $e) {
            Log::error('Error in EmployeeHoursPerMonthChart: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching data.'], 500);
        }
    }

    public function AdminTotalHoursPerMonthChart(): JsonResponse
    {
        try {
            $allUsers = User::all();
            $totalHoursPerMonth = array_fill(1, 12, 0);
            $currentYear = Carbon::now()->year;

            foreach ($allUsers as $user) {
                for ($month = 1; $month <= 12; $month++) {
                    $overallSum = Timelog::where('user_id', $user->id)
                        ->whereMonth('date', $month)
                        ->whereYear('date', $currentYear)
                        ->sum('time');

                    $totalHoursPerMonth[$month] += $overallSum;
                }
            }

            $overallHoursPerMonthData = array_values($totalHoursPerMonth);

            return response()->json(['overallHoursPerMonthData' => $overallHoursPerMonthData]);
        } catch (\Exception $e) {
            Log::error('Error in AdminTotalHoursPerMonthChart: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching data.'], 500);
        }
    }

    public function AdminTotalHoursPerProjectChart(): JsonResponse
    {
        try {
            $allTimelogs = Timelog::all();

            $allProjects = Project::all();
            $totalHoursPerProject = [];

            foreach ($allProjects as $project) {
                $timelogsForProject = $allTimelogs->where('project_id', $project->id);

                $totalHours = $timelogsForProject->sum('time');

                $totalHoursPerProject[] = [
                    'name' => $project->name,
                    'totalHours' => $totalHours,
                ];
            }

            return response()->json(['projectsAndHours' => $totalHoursPerProject]);
        } catch (\Exception $e) {
            Log::error('Error in AdminTotalHoursPerProjectChart: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching data.'], 500);
        }
    }
}
