<?php

namespace App\Providers;

use App\Policies\PostPolicy;
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
            'App\Models\Post'       => 'App\Policies\PostPolicy',
            'App\Models\Permission' => 'App\Policies\PermissionPolicy',
            'App\Models\Role'       => 'App\Policies\RolePolicy',
            'App\Models\User'       => 'App\Policies\UserPolicy',
            'App\Models\Category'   => CategoryPolicy::class,
            'App\Models\Category'   => 'App\Policies\CategoryPolicy',
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
