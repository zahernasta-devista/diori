<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
<<<<<<< Updated upstream
use App\models\User;
use App\models\Organization;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
=======
use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
            'organization_id' => ['required ']
=======
           
>>>>>>> Stashed changes
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'password' => Hash::make($request->password),
<<<<<<< Updated upstream
            //'organization_id' => auth()->id()
            'organization_id' => $request->organization_id,
=======
            'organization_id' => auth()->user()->organization_id,
            
>>>>>>> Stashed changes

            
           
        ]);

        //event(new Registered($user));
        return redirect('/users');
    }
<<<<<<< Updated upstream
=======


    
>>>>>>> Stashed changes
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

    // public function userslist()
    // {
    //     return view('admin.userslist');
    // }
    public function datatable()
    {
        return view('admin.datatable');
    }
    public function verticalmenu()
    {
        return view('admin.verticalmenu');
    }



}
