<?php

namespace App\Providers;

use App\Models\Meta\Meta;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $meta = json_decode(Meta::where('key', 'portal-desa-digital')->first()->value);
            $view->with('desa', $meta);
        });
    }
}
