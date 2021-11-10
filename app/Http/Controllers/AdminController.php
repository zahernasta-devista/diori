<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
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

    public function usersList()
    {
        return view('admin.users-list');
    }
    public function datatable()
    {
        return view('admin.datatable');
    }
    public function verticalMenu()
    {
        return view('admin.vertical-menu');
    }



}
