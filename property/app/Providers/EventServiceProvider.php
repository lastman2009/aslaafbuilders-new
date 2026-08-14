<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\NewUser::class => [
            \App\Listeners\SendEmail::class,
        ],
        \App\Events\SaveProperty::class => [
            \App\Listeners\SendProperty::class,
        ],
        \App\Events\ContactUs::class => [
            \App\Listeners\ContactUsListener::class,
        ],
        \App\Events\WebsiteEmail::class => [
            \App\Listeners\SendEmailForWebsite::class,
        ],
    ];
}
