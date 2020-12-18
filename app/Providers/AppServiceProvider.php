<?php

namespace App\Providers;

use App\Services\Surat\Service as SuratService;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $installed = file_exists(storage_path('/installed'));

        if (!$installed) {
            header('Location: /install.php');
        }
    }

    public function registerSuratService(): void
    {
        $this->app->bindIf(SuratService::class, fn () => new SuratService);
    }
}
