<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    //
    public function addProjectPage()
    {
        $customers = Customer::get();
        return view('admin.add-project', ['customers' => $customers]);
    }


    public function getProjects()
    {
        $projects = Project::get();
        return view('admin.project-table', ['projects' => $projects]);
    }

    public function addProjects(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'backend' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date']

        ]);

        $project = Project::create([
            'name' => $request->name,
            'backend' => $request->backend,
            'start_date' => $request->start_date,
            'customer_id' => $request->customer
        ]);

        event(new Registered($project));

        return redirect('/projects');
    }


    public function deleteProject(Request $request)
    {
        $project = Project::findorfail($request->route('id'));
        $project->delete();
        return redirect()->to('/projects');
    }

    public function editProjectPage(Request $request)
    {
        $project = Project::get()->where('id', $request->route('id'))->first();
        $customers = Customer::get();

        return view('admin.edit-project', ['project' => $project], ['customers' => $customers]);
    }

    public function editProject(Request $request)
    {
        $project = Project::findorfail($request->route('id'));
        $project->name = request()->input('name');
        $project->backend = request()->input('backend');
        $project->start_date = request()->input('start_date');
        $project->customer->name = request()->input('customer_id');
        $project->save();

        return redirect()->to('/projects');
    }

    public function getProjectById(Request $request) {
    
        $project = Project::findorfail($request->route('id'));
        
        return response()->json(['project'=>$project]);
        
    }
}
