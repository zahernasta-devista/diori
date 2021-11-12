<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use App\Models\Customer;
class AdminController extends Controller
{
  

    public function showUsersList(){
        $users = User::get()
        ->where('organization_id', 1);
        return view('admin.users',['users' => $users]); 
    }
      public function showAddUser()
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
    public function getEdit(Request $request) {

        Log::info('test');

        $users = User::get()->where('id',$request->route('id'))->first();



        return view('admin.edit-user', ['users'=> $users]);



    }

    public function editUsers(Request $request): \Illuminate\Http\RedirectResponse

    {

        $users = User::findorfail($request->route('id'));

        $users->name = request()->input('name');

        $users->position = request()->input('position');

        $users->email = request()->input('email');

        $users->save();



        return redirect()->to('users');

    }

    public function deleteUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        Log::info('test');
        $user = User::findorfail($request->route('id'));
        $user->delete();
        return redirect()->to('users');
    }
    public function showCostumersList(){

        $customers = Customer::get();

        return view('admin.customers',['customers' => $customers]);

    }
    public function showAddCustomer()
    {
        return view('admin.add-customers');
    }

   
   public function storeCustomer(Request $request)
   {
       $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           
       ]);
   
       $customers = Customer::create([
           'name' => $request->name,
           'email' => $request->email,
        
       ]);

       //event(new Registered($user));
       return redirect('/customers');
   }

    public function showCostumersList(){
        $customers = Customer::get();
        return view('admin.customers',['customers' => $customers]); 
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
