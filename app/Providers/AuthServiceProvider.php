<?php

namespace App\Providers;

use App\Models\administradore;
use App\Policies\administradorePolicy;
use App\Models\Cliente;
use App\Policies\ClientePolicy;
use App\Models\Trabajadore;
use App\Policies\TrabajadorePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        administradore::class => administradorePolicy::class,
        Cliente::class => ClientePolicy::class,
        Trabajadore::class => TrabajadorePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
