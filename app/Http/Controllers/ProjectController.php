<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    //
    public function addProjectPage()
    {
        $customers = Customer::get();
        return view('admin.add-project',['customers' => $customers]);
    }

    public function getProjects(){
        $projects = Project::get();
        return view('admin.project-table',['projects' => $projects]);
    }

    public function addProjects(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'backend' => ['required', 'string', 'max:255'],
            'start_date'=>['required','date']

        ]);

        $project= Project::create([
            'name' => $request->name,
            'backend' => $request->backend,
            'start_date'=> $request->start_date,
            'customer_id'=>$request->customer
        ]);

        Log::info('created');
        event(new Registered($project));

        return redirect('/datatable');
    }
}
