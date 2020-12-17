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
            $meta = Meta::where('key', 'portal-desa-digital');

            if ($meta->exists()) {
                $view->with('desa', $meta->first()->decode());
            }
        });
    }
}
