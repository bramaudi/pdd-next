<?php

namespace App\Providers;

use App\Models\Surat\SuratFormat;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSuratBuilder();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function registerSuratBuilder(): void
    {
        // $this->app->bindIf(SuratFormat::class, fn () => new SuratFormat());
    }
}
