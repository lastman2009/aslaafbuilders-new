<?php

namespace App\Listeners;

use App\Events\SaveProperty;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\SavePropertyData;
class SendProperty
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
     * @param  SaveProperty  $event
     * @return void
     */
    public function handle(SaveProperty $event)
    {
         Mail::to($event->email)->send(new SavePropertyData($event->property));
    }
}
