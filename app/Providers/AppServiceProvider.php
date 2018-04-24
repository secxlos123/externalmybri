<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // if( env('IS_SSL', 1) ){
        //     \URL::forceScheme('https');
        // }

        $host = $request->getSchemeAndHttpHost();
        $cek = substr($host, 0,8);
        \Log::info($cek);
        if( $cek == 'https://' ){
            \Log::info("HTTPS");
            \URL::forceScheme('https');
        }
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
