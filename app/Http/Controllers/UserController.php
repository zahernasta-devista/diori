<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function changePassword(){
        return view('auth.change-password');

    }

}
