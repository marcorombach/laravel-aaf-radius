<?php

namespace Marcorombach\LaravelAafRadius\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marcorombach\LaravelAafRadius\LaravelAafRadius
 */
class LaravelAafRadius extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-aaf-radius';
    }
}
