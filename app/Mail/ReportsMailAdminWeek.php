<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportsMailAdminWeek extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $startWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endWeek= Carbon::now()->endOfWeek()->format('Y-m-d');

        return $this->markdown('emails.weekly-reports',['startWeek' => $startWeek, 'endWeek' => $endWeek]);
    }
}
