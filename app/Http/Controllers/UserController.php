<?php

namespace App\Http\Controllers;

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

        if(Auth::user()->getRoleNames()[0] == "admin" ){
            return view('admin.index');
        }

        elseif(Auth::user()->getRoleNames()[0] == "employee"){
            return view('employee.dashboard-employee');
        }

    }

}
