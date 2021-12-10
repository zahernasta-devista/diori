<?php

namespace App\Console\Commands;

use App\Mail\ReportsMail;
use Illuminate\Console\Command;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Command\Command as CommandAlias;

class SendEmailsAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reports Ready';

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
     * @return ReportsMail
     */
    public function sendReport()
    {
        Mail::to(auth()->user())->send(new reportsMail);
        return new reportsMail();
    }
}
