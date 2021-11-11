<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\models\Organization;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
  

    public function getUser(){
        $users = User::get()
        ->where('organization_id', 1);
        return view('admin.users',['users' => $users]); 
    }
      public function create()
     {
         return view('admin.addUser');
     }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'position' => ['required', 'string', 'max:255'],
            'password' => ['required '],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'password' => Hash::make($request->password),
            'organization_id' => auth()->user()->organization_id,
        ]);

        //event(new Registered($user));
        return redirect('/users');
    }

    public function adminProfile()
    {
        return view('admin.admin-profile');
    }
    public function index()
    {
        return view('admin.index');
    }

    public function empty()
    {
        return view('admin.empty');
    }

    public function tables()
    {
        return view('admin.tables');
    }

    public function datatable()
    {
        return view('admin.datatable');
    }
    public function verticalmenu()
    {
        return view('admin.verticalmenu');
    }

}
