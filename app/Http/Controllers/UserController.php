<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function changePassword(){
        return view('auth.change-password');

    }

    public function login(){
        return view('auth.login');

    }

}
