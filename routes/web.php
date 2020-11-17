<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Dashboard\Config;
use App\Http\Controllers\Dashboard\Keluarga;
use App\Http\Controllers\Dashboard\Penduduk;
use App\Http\Controllers\Dashboard\Permission;
use App\Http\Controllers\Dashboard\Role;
use App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Dashboard\Wilayah;
use App\Http\Controllers\Welcome;

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

Route::get('/', [Welcome::class, 'index']);
Route::get('/login', [Login::class, 'index'])->name('login');

Route::group(['prefix' => '/dashboard', 'middleware' => 'auth'], function ()
{
    
    Route::get('/', [Dashboard::class, 'index']);

    /** Desa */
    Route::group(['prefix' => '/desa', 'namespace' => 'Dashboard'], function ()
    {
        Route::get('/config', [Config::class, 'index']);
        Route::get('/wilayah', [Wilayah::class, 'index'])->name('wilayah.dusun');
        Route::get('/wilayah/rw/{lingkungan_id}', [Wilayah::class, 'rw'])->name('wilayah.rw');
        Route::get('/wilayah/rt/{rw_id}', [Wilayah::class, 'rt'])->name('wilayah.rt');
    });

    /** Kependudukan */
    Route::group(['prefix' => '/kependudukan'], function ()
    {
        Route::get('/penduduk', [Penduduk::class, 'index'])->name('penduduk.index');
        Route::get('/penduduk/update/{id}', [Penduduk::class, 'update'])->name('penduduk.update');
        Route::get('/penduduk/create', [Penduduk::class, 'create'])->name('penduduk.create');
        Route::get('/keluarga', [Keluarga::class, 'index']);
    });

    /** Sistem */
    Route::group(['prefix' => '/sistem'], function ()
    {
        Route::get('/user', [User::class, 'index']);
        Route::get('/role', [Role::class, 'index']);
        Route::get('/permission/{roleId?}', [Permission::class, 'index']);
    });
});
