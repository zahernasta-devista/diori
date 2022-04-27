<?php

namespace App\Console\Commands;

use App\Mail\NewProjectAssignedNotification;
use App\Mail\ReportsMailAdminMonth;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Command\Command as CommandAlias;

class SendEmailForNewAssignedProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:new-project-assigned';

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
    public function handle()
    {
        $users = User::get();
        foreach ($users as $user) {
            if ($user->getRoleNames()[0] !== "employee") {
                Mail::to($user->email)->send(new NewProjectAssignedNotification);
            }
        }
    }
}
