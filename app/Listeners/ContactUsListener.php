<?php

namespace App\Listeners;

use App\Events\ContactUs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\ContactUsMail;
class ContactUsListener
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
     * @param  ContactUs  $event
     * @return void
     */
    public function handle(ContactUs $event)
    {
       Mail::to("support@rightdeed.com")->send(new ContactUsMail($event->data));
    }
}
