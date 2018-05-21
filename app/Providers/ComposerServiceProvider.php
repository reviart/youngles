<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            ['welcome', 'public.price'], 'App\Http\ViewComposers\PriceComposer'
        );
        View::composer(
            ['welcome', 'public.information'], 'App\Http\ViewComposers\InformationComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
