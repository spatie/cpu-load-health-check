<?php

namespace Spatie\CpuLoadHealthCheck\Tests\TestClasses;

use Spatie\CpuLoadHealthCheck\CpuLoad;
use Spatie\CpuLoadHealthCheck\CpuLoadHealthCheck;

class FakeCpuLoadHealthCheck extends CpuLoadHealthCheck
{
    protected CpuLoad $fakeCpuLoad;

    public function measureCpuLoad(): CpuLoad
    {
        return $this->fakeCpuLoad;
    }

    public function fakeCpuLoad(
        float $lastMinute = 0,
        float $lastFiveMinutes = 0,
        float $lastFifteenMinutes = 0,
    ): self {
        $this->fakeCpuLoad = new CpuLoad($lastMinute, $lastFiveMinutes, $lastFifteenMinutes);

        return $this;
    }
}
