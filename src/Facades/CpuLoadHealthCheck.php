<?php

namespace Spatie\CpuLoadHealthCheck\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Spatie\CpuLoadHealthCheck\CpuLoadHealthCheck
 */
class CpuLoadHealthCheck extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cpu-load-health-check';
    }
}
