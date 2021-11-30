<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;


class ChangePasswordProfileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);


       $user =  User::findorfail(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->withErrors('Password Updated');
    }
}
