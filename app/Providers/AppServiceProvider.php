<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Eusebiu\JavaScript\Facades\ScriptVariables;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    ScriptVariables::add(function () {
		    return [
			    'csrfToken' => csrf_token(),
		    ];
	    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
