<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        Inertia::share('flash', function() {
            $share = [];

            if(Session::get('dish'))
                $share['dish'] = Session::get('dish');

            return [
                'status' => Session::get('status'),
            ] + $share;
        });
    }
}
