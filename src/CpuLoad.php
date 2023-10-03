<?php

namespace Spatie\CpuLoadHealthCheck;

use Spatie\CpuLoadHealthCheck\Exceptions\CouldNotMeasureCpuLoad;

class CpuLoad
{
    public static function measure(): self
    {
        $result = false;

        if (function_exists('sys_getloadavg')) {
            $result = sys_getloadavg();
        }

        if (! $result) {
            throw CouldNotMeasureCpuLoad::make();
        }

        $result = array_map(fn ($n) => round($n, 2), $result);

        return new self(...$result);
    }

    public function __construct(
        public float $lastMinute,
        public float $last5Minutes,
        public float $last15Minutes,
    ) {
    }
}
