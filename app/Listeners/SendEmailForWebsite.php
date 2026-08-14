<?php

namespace App\Listeners;

use App\Events\WebsiteEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\SendWebsiteContactEmail;
class SendEmailForWebsite
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
     * @param  WebsiteEmail  $event
     * @return void
     */
    public function handle(WebsiteEmail $event)
    {   

        Mail::to($event->email)->send(new SendWebsiteContactEmail($event->data));
    }
}
