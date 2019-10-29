<?php

namespace App\Providers;

use App\Policies\MainPolicy;
use App\Portfolio;
use App\Price;
use App\Service;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Service::class => MainPolicy::class,
        Portfolio::class => MainPolicy::class,
        Price::class => MainPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
