<?php

namespace App\Facades;

use App\Services\Surat\Service;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection listTemplate()
 */
class Surat extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Service::class;
    }
}
