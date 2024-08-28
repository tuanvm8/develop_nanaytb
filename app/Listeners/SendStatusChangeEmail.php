<?php

namespace App\Listeners;

use App\Events\UserStatusChanged;
use App\Mail\StatusChangeNotification;
use Illuminate\Support\Facades\Mail;
class SendStatusChangeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserStatusChanged $event): void
    {
        Mail::to($event->user->email)->send(new StatusChangeNotification($event->user));
    }
}
