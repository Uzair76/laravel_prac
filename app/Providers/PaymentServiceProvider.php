<?php

namespace App\Providers;

use App\PaymentMethod\PaypalAPI;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
        $this->app->bind(PaypalAPI::class, function(){

            return new PaypalAPI("hello-".rand(0, 1500));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
