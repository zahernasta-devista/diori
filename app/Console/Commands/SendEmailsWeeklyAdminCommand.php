<?php

namespace App\Console\Commands;

use App\Mail\ReportsMailAdminWeek;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Console\Command;

class SendEmailsWeeklyAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send-emails-weekly-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::get();
        foreach ($users as $user) {
            if ($user->getRoleNames()[0] !== "employee") {
                Mail::to($user->email)->send(new ReportsMailAdminWeek);
            }
        }
    }
}
