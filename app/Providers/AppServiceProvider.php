<?php

namespace App\Providers;

use App\Policies\RolePolicy;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Utilities\MenuBuilder;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton('menubuilder', function ($app) {
            return new MenuBuilder;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        RateLimiter::for('login', function (Request $request) {
            return [
                Limit::perMinute(5)->by($request->ip()),
                Limit::perMinute(3)->by(
                    $request->ip().'|'.$request->input('email')
                ),
            ];
        });

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
        Gate::policy(Role::class, RolePolicy::class);
    }
}
