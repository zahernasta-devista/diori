<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function changePassword(){
        return view('auth.change-password');

    }

    public function login(){
        return view('auth.login');

    }
    public function dashboard(){
        $user = User::role('employee')->get()->count();
        $project =  Project::count();
        $customer =  Customer::count();


        if(Auth::user()->getRoleNames()[0] == "admin" ){
            return view('admin.index',['project'=>$project,'customer'=>$customer,'user'=>$user]);
        }

        elseif(Auth::user()->getRoleNames()[0] == "employee"){
            return view('employee.dashboard-employee');
        }

    }



}
