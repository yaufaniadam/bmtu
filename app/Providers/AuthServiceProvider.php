<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', fn () =>  Auth::user()->role == Role::IS_HRD);
        Gate::define('marketing_manager', fn () =>  Auth::user()->role == Role::IS_MARKETING_MANAGER);
        Gate::define('marketing_employee', fn () =>  Auth::user()->role == Role::IS_MARKETING_EMPLOYEE);
        Gate::define('employee', fn () =>  Auth::user()->role == Role::IS_EMPLOYEE);
        //
    }
}
