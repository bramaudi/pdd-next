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
     * Auth Routes
     */
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', Dashboard::class);
    
        // Dashboard
        Route::group([
            'namespace' => 'Dashboard',
            'prefix' => 'dashboard'
        ], function ()
        {
            Route::group(['middleware' => ['role:Super Admin']], function () {
                Route::get('/user', User\Index::class);
                Route::get('/role', Role\Index::class);
            });
        });
    });
});

