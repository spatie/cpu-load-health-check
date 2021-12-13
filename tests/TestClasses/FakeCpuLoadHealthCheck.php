<?php

namespace Spatie\CpuLoadHealthCheck\Tests\TestClasses;

use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\CpuLoadHealthCheck\CpuLoadHealthCheck;

class FakeCpuLoadHealthCheck extends CpuLoadHealthCheck
{
    protected CpuLoadCheck $fakeCpuLoad;

    public function measureCpuLoad(): CpuLoadCheck
    {
        return $this->fakeCpuLoad;
    }

    public function fakeCpuLoad(
        float $lastMinute = 0,
        float $last5Minutes = 0,
        float $last15Minutes = 0,
    ): self
    {
        $this->fakeCpuLoad = new CpuLoadCheck($lastMinute, $last5Minutes, $last15Minutes);

        return $this;
    }
}
