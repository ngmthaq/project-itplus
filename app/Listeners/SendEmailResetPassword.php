<?php

namespace App\Listeners;

use App\Events\ResetPasswordConfirmed;
use App\Mail\ResetPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailResetPassword implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ResetPasswordConfirmed  $event
     * @return void
     */
    public function handle(ResetPasswordConfirmed $event)
    {
        Mail::to($event->user->email)->send(new ResetPasswordMail($event->user));
    }
}
