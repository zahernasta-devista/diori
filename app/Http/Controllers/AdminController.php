<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Organization;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\Timelog;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGenerator;

class AdminController extends Controller
{

    public function showUsersList()
    {
        $users = User::get()
            ->where('organization_id', 1);
        return view('admin.users', ['users' => $users]);
    }

    public function showAddUser()
    {
        return view('admin.addUser');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'position' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'password' => Hash::make($request->password),
            'organization_id' => auth()->user()->organization_id,
        ]);

        $user->assignRole([2]);

        event(new Registered($user));
        return redirect('/users');
    }


    public function EmployeeDetail(Request $request)
    {

        $users = User::get()->where('id', $request->route('id'))->first();
        $date = Carbon::now()->format('d-m-y');
        $user = User::role('employee')->get()->count();
        $project = Project::count();
        $timeSum = DB::table('timelogs')->where('user_id', $request->route('id'))->whereMonth('date', Carbon::now()->month)->sum('time');
        $customer = Customer::count();
        $projects = User::get()->where('id', $request->route('id'))->first()->projects;
        $projectCount = User::get()->where('id', $request->route('id'))->first()->projects->count();
        $timeLogs = Timelog::get()->where('user_id', $request->route('id'))->all();


        return view('admin.employee-detail', ['users' => $users, 'date' => $date, 'projectCount' => $projectCount, 'project' => $project, 'customer' => $customer, 'user' => $user, 'projects' => $projects, 'timeSum' => $timeSum], compact('projects'));

    }

    public function responseDetail(Request $request)
    {
        $startWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endWeek= Carbon::now()->endOfWeek()->format('Y-m-d');

        $daySum = DB::table('timelogs')->where('user_id', $request->route('id'))->whereDay('date', Carbon::now())->sum('time');
        $weekSum = DB::table('timelogs')->where('user_id', $request->route('id'))->whereBetween('date', [$startWeek, $endWeek])->sum('time');
        $monthSum = DB::table('timelogs')->where('user_id', $request->route('id'))->whereMonth('date', Carbon::now()->month)->sum('time');
        $users = User::get()->where('id', $request->route('id'))->first();
        $timeLogs = Timelog::get()->where('user_id', $request->route('id'))->all();
        $project = [];
        foreach ($timeLogs as $timeLog) {
            $object = new \stdClass();

            $object->time = $timeLog->time;
            $object->date = $timeLog->date;
            $object->comment = $timeLog->comment;
            $object->project = $timeLog->project->name;
            $project[] = $object;
        }
        return response()->json(['response' => $project, 'users' => $users,'hours' =>[$daySum,$weekSum,$monthSum]]);
    }


    public function getEdit(Request $request)
    {

        $users = User::get()->where('id', $request->route('id'))->first();

        return view('admin.edit-user', ['users' => $users]);
    }


    public function editUsers(Request $request): \Illuminate\Http\RedirectResponse
    {

        $users = User::findorfail($request->route('id'));
        $users->name = request()->input('name');
        $users->position = request()->input('position');
        $users->email = request()->input('email');
        $users->password = Hash::make(request()->input('password'));
        $users->save();

        return redirect()->to('users');

    }

    public function deleteUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::findorfail($request->route('id'));
        $user->delete();
        return redirect()->to('users');
    }

    public function showCostumersList()
    {

        $customers = Customer::get();

        return view('admin.customers', ['customers' => $customers]);

    }

    public function showAddCustomer()
    {

        return view('admin.add-customers');
    }


    public function storeCustomer(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ]);

        $customers = Customer::create([
            'name' => $request->name,
            'email' => $request->email,

        ]);


        return redirect('/customers');
    }

    public function getCustomer(Request $request)
    {

        $customers = Customer::get()->where('id', $request->route('id'))->first();

        return view('admin.edit-customer-page', ['customers' => $customers]);
    }

    public function deleteCustomer(Request $request): \Illuminate\Http\RedirectResponse
    {

        $customers = Customer::findorfail($request->route('id'));
        $customers->delete();

        return redirect()->to('customers');
    }

    public function assignProjectToPage(Request $request)
    {

        $projects = Project::get();
        $user = User::get()->where('id', $request->route('id'))->first();

        return view('admin.assign-project-to', ['projects' => $projects], ['user' => $user]);
    }

    public function employeeProjectsAssignedPage(Request $request)
    {

        $user = User::get()->where('id', $request->route('id'))->first();
        $projects = $user->projects()->get();

        return view('admin.employee-projects-assigned', ['projects' => $projects], ['user' => $user]);
    }

    public function assignEmployeeToProject(Request $request)
    {

        $user = User::findorfail($request->route('user_id'));
        $project = Project::findorfail($request->project);
        $user->projects()->syncWithoutDetaching($project);

        $user->save();

        return redirect('/employee/projects/' . $request->route('user_id'));
    }

    public function unassignProject(Request $request)
    {

        $user = User::findorfail($request->route('user_id'));
        $project = Project::findorfail($request->route('project_id'));
        $user->projects()->detach($project);

        return redirect()->back();
    }

    public function editCustomers(Request $request): \Illuminate\Http\RedirectResponse
    {

        $customers = Customer::findorfail($request->route('id'));
        $customers->name = request()->input('name');
        $customers->email = request()->input('email');

        $customers->save();

        return redirect()->to('customers');
    }

    public function customersProjectsAssignedPage(Request $request)
    {

        $customers = Customer::get()->where('id', $request->route('id'))->first();
        $projects = $customers->projects()->get();

        return view('admin.customer-projects-page', ['projects' => $projects], ['customers' => $customers]);
    }

    public function deleteUsingCheckBoxesProjects(Request $request)
    {
        $checkedIds = $request->checkboxes;

        foreach ($checkedIds as $id) {
            Project::where('id', intval($id))->delete();
        }
        return redirect()->back();

    }

    public function deleteUsingCheckBoxesEmployees(Request $request)
    {
        $checkedIds = $request->checkboxes;

        foreach ($checkedIds as $id) {
            User::where('id', intval($id))->delete();
        }
        return redirect()->back();

    }

    public function deleteUsingCheckBoxesCustomer(Request $request)
    {
        $checkedIds = $request->checkboxes;

        foreach ($checkedIds as $id) {
            Customer::where('id', intval($id))->delete();
        }
        return redirect()->back();

    }

    public function deleteUsingCheckBoxesAdmin(Request $request)
    {
        $checkedIds = $request->checkboxes;

        foreach ($checkedIds as $id) {
            User::where('id', intval($id))->delete();
        }
        return redirect()->back();

    }

    public function adminList(Request $request)
    {
        $users = User::get()
            ->where('organization_id', 1);
        return view('admin.admin-list', ['users' => $users]);
    }

    public function getEditAdmin(Request $request)
    {

        $users = User::get()->where('id', $request->route('id'))->first();

        return view('admin.edit-admin', ['users' => $users]);
    }

    public function editAdmin(Request $request): \Illuminate\Http\RedirectResponse
    {

        $users = User::findorfail($request->route('id'));
        $users->name = request()->input('name');
        $users->position = request()->input('position');
        $users->email = request()->input('email');

        $users->save();

        return redirect()->to('admin/list');

    }

    public function deleteAdmin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::findorfail($request->route('id'));
        $user->delete();
        return redirect()->to('admin/list');
    }

    public function makeAdmin(Request $request)
    {
        $user = User::findorfail($request->route('id'));

        $user->assignRole([1]);
        $user->removeRole(2);

        return redirect('/admin/list');
    }


    public function monthlySummary(Request $request)
    {

        $query = $request->query();
        $userDetails = [];

        $validMonth = Carbon::now()->subMonth()->format('m');
        $validYear = Carbon::now()->subMonth()->format('Y');
        if ($query['month'] !== $validMonth || $query['year'] !== $validYear) {
            return view('admin.monthly-summary', compact('userDetails'))->withErrors('You Cannot Change The URL!');
        }


        if (!isset($query['month'])) {
            return view('admin.monthly-summary', compact('userDetails'));
        }

        $month = $query['month'];
        $year = $query['year'];
        $users = User::get();

        foreach ($users as $user) {
            $object = new \stdClass();
            $object->user = $user;
            $object->projects = [];
            foreach ($user->projects as $project) {
                $object->projects[$project->name] = $this->calculateTotalHoursWorked($project->timelogsFromMonthAndYear($month, $year, $user->id));
            }
            $object->hoursWorkedPerMonth = $this->calculateTotalHoursWorked($user->timelogsFromMonthAndYear($month, $year));
            $userDetails[] = $object;
        }


        return view('admin.monthly-summary', compact('userDetails', 'users'));
    }

    public function weeklySummary(Request $request)
    {
        $query = $request->query();
        $userDetails = [];

        $start = Carbon::now()->startOfWeek()->format('Y-m-d');
        $end = Carbon::now()->endOfWeek()->format('Y-m-d');

        if ($query['startWeek'] !== $start || $query['endWeek'] !== $end) {
            return view('admin.weekly-summary', compact('userDetails'))->withErrors('You Cannot Change The URL!');
        }


        if (!isset($query['startWeek']) || !isset($query['endWeek'])) {
            return view('admin.weekly-summary', compact('userDetails'))->withErrors('You Cannot Change The URL!');
        }

        $startWeek = $query['startWeek'];
        $endWeek = $query['endWeek'];
        $users = User::get();

        foreach ($users as $user) {
            $object = new \stdClass();
            $object->user = $user;
            $object->projects = [];
            foreach ($user->projects as $project) {
                $object->projects[$project->name] = $this->calculateTotalHoursWorked($project->timelogsFromWeek($startWeek, $endWeek, $user->id));
            }
            $object->hoursWorkedPerWeek = $this->calculateTotalHoursWorked($user->timelogsFromWeek($startWeek, $endWeek));
            $userDetails[] = $object;
        }

        return view('admin.weekly-summary', compact('userDetails', 'users'));
    }

    public function makeEmployee(Request $request)
    {
        $user = User::findorfail($request->route('id'));


        $user->assignRole([2]);
        $user->removeRole(1);

        return redirect('/users');
    }

    public function filters(Request $request)
    {

        $selectedMonth = $request->input('month');
        $selectedYear = $request->input('year');
        $selectedProject = $request->input('project');

        $projectsOptions = Project::get();

        $sumPerSelectedProject = Timelog::where('project_id', $request->input('project'))->whereMonth('date', $request->input('month'))->whereYear('date', $request->input('year'))->sum('time');
        $overallSum = Timelog::whereMonth('date', $request->input('month'))->whereYear('date', $request->input('year'))->sum('time');

        $query = $request->query();
        $userDetails = [];

        if (!isset($query['month']) || !isset($query['year'])) {
            return view('admin.summary-filters', compact('userDetails','selectedMonth','selectedYear','selectedProject','sumPerSelectedProject','overallSum','projectsOptions'))->withErrors('Please Select The Month And Year Together');
        }


        if (isset($query['project'])) {
            $month = $query['month'];
            $year = $query['year'];
            $projectSelected = $query['project'];
            $users = User::get();

            foreach ($users as $user) {
                $object = new \stdClass();
                $object->user = $user;
                $object->projects = [];

                $object->hoursWorkedPerMonth = $this->calculateTotalHoursWorked($user->timelogsFromMonthAndYearForProject($month, $year, $projectSelected));
                $userDetails[] = $object;


            }
            return view('admin.summary-filters', compact('userDetails', 'users', 'projectsOptions', 'overallSum', 'sumPerSelectedProject','selectedMonth','selectedYear','selectedProject'));
        }
        if (isset($query['month']) || isset($query['year'])) {
            $month = $query['month'];
            $year = $query['year'];
            $users = User::get();


            foreach ($users as $user) {
                $object = new \stdClass();
                $object->user = $user;
                $object->projects = [];
                foreach ($user->projects as $project) {
                    $object->projects[$project->name] = $this->calculateTotalHoursWorked($project->timelogsFromMonthAndYear($month, $year, $user->id));
                }
                $object->hoursWorkedPerMonth = $this->calculateTotalHoursWorked($user->timelogsFromMonthAndYear($month, $year));
                $userDetails[] = $object;
            }

            return view('admin.summary-filters', compact('userDetails', 'users', 'projectsOptions', 'overallSum', 'sumPerSelectedProject','selectedMonth','selectedYear','selectedProject'))->withErrors('No Project Was Selected!');
        }
    }

    private function calculateTotalHoursWorked($timelogs): int
    {
        $sumOfHoursWorked = 0;
        foreach ($timelogs as $timelog) {
            $sumOfHoursWorked += $timelog->time;
        }

        return $sumOfHoursWorked;
    }

    public function adminProfile()
    {
        return view('admin.admin-profile');
    }

    public function empty()
    {
        return view('admin.empty');
    }


    public function verticalMenu()
    {
        return view('admin.vertical-menu');
    }

}

