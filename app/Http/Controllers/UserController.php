<?php



namespace App\Http\Controllers;



use App\Models\Customer;

use App\Models\Project;

use App\Models\Timelog;

use App\Models\User;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;



use Facade\FlareClient\Time\Time;

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

    public function dashboard(Request $request){

        $userId = auth()->user()->id;
        $projects = auth()->user()->projects;
        
        $timeSum = DB::table('timelogs')->where('user_id', $userId)->whereMonth('date',Carbon::now()->month)->sum('time');
        
        $currentDate = Carbon::now()->year . "-" . Carbon::now()->month ."-" . (Carbon::now()->day < 10 ? "0". Carbon::now()->day : Carbon::now()->day);
        
        $timelogsDatabase = Timelog::where('user_id', $userId)->whereDate('date',$currentDate);
        $timedaySum = $timelogsDatabase->sum('time');
        $timelogs = $timelogsDatabase->get();
        
       
        $date = carbon::now()->format('d-m-y');

        $user = User::role('employee')->get()->count();

        $project = Project::count();

        $customer = Customer::count();

      
        $projectCount = auth()->user()->projects->count();
         
        
        if(Auth::user()->getRoleNames()[0] == "admin" ){

            return view('admin.index',['project'=>$project,'customer'=>$customer,'user'=>$user]);

        }

        elseif(Auth::user()->getRoleNames()[0] == "employee"){

            return view('employee.dashboard-employee',['date'=>$date,'timelogs'=>$timelogs,'projectCount'=>$projectCount,'timeSum'=>$timeSum,'timedaySum'=>$timedaySum,'projects'=>$projects],compact('projects'));

        }

    }

}