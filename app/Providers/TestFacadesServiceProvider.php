<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Test\TestFacades;

class TestFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('test',function() {
            return new TestFacades;
         });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
