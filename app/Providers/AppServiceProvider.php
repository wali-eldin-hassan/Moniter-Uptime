<?php

namespace App\Providers;

use App\Models\EndPoint;
use App\Models\Site;
use App\Observers\EndPointObserver;
use App\Observers\SiteObserver;
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
        Site::observe(SiteObserver::class);
        EndPoint::observe(EndPointObserver::class);
    }
}
