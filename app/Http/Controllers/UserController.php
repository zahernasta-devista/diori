<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

   	public function index()
	{
		return view('index');
    }


	public function calendar2()
	{
		return view('calendar2');
    }

	public function datatable()
	{
		return view('datatable');
	}

	public function editprofile()
	{
		return view('editprofile');
	}


	public function empty()
	{
		return view('empty');
	}


	public function forgotpassword()
	{
		return view('forgotpassword');
    }


    public function index2()
	{
		return view('index2');
	}

    public function index3()
	{
		return view('index3');
	}

    public function index4()
	{
		return view('index4');
	}

    public function index5()
	{
		return view('index5');
	}


	public function login()
	{
		return view('login');
	}



    public function register()
	{
		return view('register');
	}

	public function tables()
	{
		return view('tables');
	}

	public function userslist()
	{
		return view('userslist');
    }


	public function verticalmenu()
	{
		return view('verticalmenu');
    }

    public function addProject()
    {
        return view('add-project');
    }


}
