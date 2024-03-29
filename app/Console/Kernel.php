<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SendEmailsWeeklyEmployee::class,
        Commands\SendEmailsMonthlyAdminCommand::class,
        Commands\SendEmailsWeeklyAdminCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('command:send-emails-weekly-employee')->weeklyOn(5,'18:00');
        $schedule->command('command:send-emails-monthly-admin')->monthlyOn(2,'7:00');
        $schedule->command('command:send-emails-weekly-admin')->weeklyOn(7,'23:59');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
