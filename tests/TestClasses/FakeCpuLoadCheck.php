<?php

namespace Spatie\CpuLoadHealthCheck\Tests\TestClasses;

use Spatie\CpuLoadHealthCheck\CpuLoad;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;

class FakeCpuLoadCheck extends CpuLoadCheck
{
    protected CpuLoad $fakeCpuLoad;

    public function measureCpuLoad(): CpuLoad
    {
        return $this->fakeCpuLoad;
    }

    public function fakeCpuLoad(
        float $lastMinute = 0,
        float $last5Minutes = 0,
        float $last15Minutes = 0,
    ): self {
        $this->fakeCpuLoad = new CpuLoad($lastMinute, $last5Minutes, $last15Minutes);

        return $this;
    }
}
