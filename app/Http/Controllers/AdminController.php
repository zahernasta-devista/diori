<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
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

    public function userslist()
    {
        return view('admin.userslist');
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
