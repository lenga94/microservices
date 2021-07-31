<?php

namespace App\Providers;

use App\Company;
use App\Observers\CompaniesObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        Company::observe(CompaniesObserver::class);
    }
}
