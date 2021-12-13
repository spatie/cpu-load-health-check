<?php

namespace Spatie\CpuLoadHealthCheck;

use Spatie\CpuLoadHealthCheck\Exceptions\CouldNotMeasureCpuLoad;

class CpuLoadCheck
{
    public static function measure(): self
    {
        if (! function_exists('sys_getloadavg')) {
            throw CouldNotMeasureCpuLoad::make();
        }

        $result = sys_getloadavg();

        if (! $result) {
            throw CouldNotMeasureCpuLoad::make();
        }

        return new self(...$result);
    }

    public function __construct(
        public float $lastMinute,
        public float $last5Minutes,
        public float $last15Minutes,
    ) {
    }
}
