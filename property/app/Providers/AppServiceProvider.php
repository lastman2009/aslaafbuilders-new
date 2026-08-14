<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Laravel's paginator defaults to view "pagination::tailwind" (not
        // "pagination::default" as in Laravel 5.3, where this app started),
        // so the resources/views/vendor/pagination/default.blade.php override
        // was silently ignored. This project has no Tailwind CSS — only the
        // legacy Bootstrap 3 stylesheet, which styles .pagination > li > a.
        // Point every ->links() call at that override explicitly.
        Paginator::defaultView('vendor.pagination.default');
        Paginator::defaultSimpleView('vendor.pagination.simple-default');
    }
}
