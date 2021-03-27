<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('show', function ( $auth) {
            return $this->init($auth);
        });
        Gate::define('create', function ( $auth) {
            return $this->init($auth);
        });
        
        Gate::define('edit', function ( $auth) {
            return $this->init($auth);
        });

        Gate::define('delete', function ( $auth) {
            return $this->init($auth);
        });

        Gate::define('index', function ( $auth) {
            return $this->init($auth);
        });
        //
    }

    protected function init($auth){

        $currentAction = Route::currentRouteAction();
        list($controller, $method) = explode('@', $currentAction);
        $controller = preg_replace('/.*\\\/', '', $controller);

        $roles = unserialize($auth->roles);
        if ($auth->roles && array_key_exists("User", $roles) && array_key_exists('edit', $roles['User'])) {
            return true;
        }
    }
}
