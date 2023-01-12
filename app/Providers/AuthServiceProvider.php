<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Regular users
        Gate::define('read', function () {
            return in_array('read', auth()->user()->permissions);
        });

        // Shelfs
        Gate::define('shelf.create', function () {
            return in_array('shelf.create', auth()->user()->permissions);
        });

        Gate::define('shelf.edit', function () {
            return in_array('shelf.edit', auth()->user()->permissions);
        });

        Gate::define('shelf.delete', function () {
            return in_array('shelf.delete', auth()->user()->permissions);
        });

        // Items
        Gate::define('item.create', function () {
            return in_array('item.create', auth()->user()->permissions);
        });

        Gate::define('item.edit', function () {
            return in_array('item.edit', auth()->user()->permissions);
        });

        Gate::define('item.delete', function () {
            return in_array('item.delete', auth()->user()->permissions);
        });
    }
}
