<?php

namespace App\Console\Commands;

use App\Mail\ReportsMailEmployeeWeek;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Command\Command as CommandAlias;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SendEmailsWeeklyEmployee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send-emails-weekly-employee';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reports Ready';

    /**
     * Create a new command instance.
     *-
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(Schedule $schedule)
    {
        $users = User::get();
        $startWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endWeek = Carbon::now()->endOfWeek()->format('Y-m-d');
        foreach ($users as $user) {
            if ($user->getRoleNames()[0] !== "admin") {
                $timeSum = DB::table('timelogs')->where('user_id', $user->id)->whereBetween('date', [$startWeek, $endWeek])->sum('time');
                if ($timeSum < 40) {
                    Mail::to($user->email)->send(new ReportsMailEmployeeWeek);
                }
            }
            if ($user->getRoleNames()[0] !== "employee") {
                $timeSum = DB::table('timelogs')->where('user_id', $user->id)->whereBetween('date', [$startWeek, $endWeek])->sum('time');
                if ($timeSum < 40) {
                    Mail::to($user->email)->send(new ReportsMailEmployeeWeek);
                }
            }
        }
    }
}

