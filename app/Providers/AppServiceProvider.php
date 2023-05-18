<?php

namespace App\Providers;

use App\Models\Beehive;
use App\Policies\ApiaryPolicy;
use App\Policies\BeehivePolicy;
use Illuminate\Support\Facades\Gate;
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

        Gate::define('view', [ApiaryPolicy::class, 'view']);
        Gate::define('view', [Beehive::class, 'view']);

        Gate::define('create', [BeehivePolicy::class, 'create']);


    }
}
