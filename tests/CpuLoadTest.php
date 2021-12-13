<?php

use Spatie\CpuLoadHealthCheck\CpuLoadCheck;

it('can measure cpu load', function () {
    expect(CpuLoadCheck::measure())
       ->lastMinute->toBeGreaterThan(0)
       ->last5Minutes->toBeGreaterThan(0)
       ->last15Minutes->toBeGreaterThan(0);
});
