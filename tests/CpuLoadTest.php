<?php

use Spatie\CpuLoadHealthCheck\CpuLoad;

it('can measure cpu load', function () {
    expect(CpuLoad::measure())
       ->lastMinute->toBeGreaterThan(0)
       ->lastFiveMinutes->toBeGreaterThan(0)
       ->lastFifteenMinutes->toBeGreaterThan(0);
});
