<?php

namespace Spatie\CpuLoadHealthCheck\Exceptions;

use Exception;

class CouldNotMeasureCpuLoad extends Exception
{
    public static function make(): self
    {
        return new self("Could not measure the CPU of your system. Make sure you can run the sys_getloadavg() PHP function.");
    }
}
