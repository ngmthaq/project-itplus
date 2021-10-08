<?php

namespace App\Providers;

use App\Events\ResetPasswordConfirmed;
use App\Listeners\SendEmailResetPassword;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Event user confirmed email for reset password
        Event::listen(
            ResetPasswordConfirmed::class,
            // Listener of event
            [SendEmailResetPassword::class, 'handle']
        );
    }
}
