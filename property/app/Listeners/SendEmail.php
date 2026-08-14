<?php

namespace App\Listeners;

use App\Events\NewUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewUserSendmail;

class SendEmail
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
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {   
        define("ENCRYPTION_KEY", "!@#$%^&*");
        $id = encrypt($event->user->id, ENCRYPTION_KEY);
        Mail::to($event->user->email)->send(new NewUserSendmail($event->user ,$id));
    }
}
