<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function addProject()
    {
        return view('admin.add-project');
    }
}
