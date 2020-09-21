<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('App\Http\Controllers\Pages')->group(function()
{
    Route::get('/', Welcome::class);
    Route::get('/login', Login::class)->name('login');
    
    /**
     * Logged Auth
     */
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', Dashboard::class);
    
        // Dashboard
        Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard' ], function()
        {
            // Desa
            Route::group(
                ['middleware' => ['permission:config.read|config.update'],
                'namespace' => 'Desa',
                'prefix' => 'desa'
            ], function() {
                Route::get('/config', Config::class);
            });

            // Kependudukan
            Route::group([
                'middleware' => ['permission:penduduk.create|penduduk.read|penduduk.update|penduduk.delete'],
                'namespace' => 'Kependudukan',
                'prefix' => 'kependudukan'
            ], function() {
                Route::get('/penduduk', Penduduk::class);
                Route::get('/keluarga', Keluarga::class);
            });

            // Sistem
            Route::group(
                ['middleware' => ['permission:user.create|user.read|user.update|user.delete'],
                'namespace' => 'Sistem',
                'prefix' => 'sistem'
            ], function() {
                Route::get('/user', User::class);
                Route::get('/role', Role::class);
                Route::get('/permission/{roleId?}', Permission::class);
            });
        });
    });
});

