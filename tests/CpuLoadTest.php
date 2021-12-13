<?php

use Spatie\CpuLoadHealthCheck\CpuLoad;

it('can measure cpu load', function() {
   expect(CpuLoad::measure())
       ->lastMinute->toBeGreaterThan(0)
       ->last5Minutes->toBeGreaterThan(0)
       ->last15Minutes->toBeGreaterThan(0);
});
