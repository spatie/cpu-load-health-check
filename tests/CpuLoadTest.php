<?php

use Spatie\CpuLoadHealthCheck\CpuLoad;

it('can measure cpu load', function () {
    expect(CpuLoad::measure())
       ->lastMinute->toBeGreaterThan(0)
       ->last5Minutes->toBeGreaterThan(0)
       ->last15Minutes->toBeGreaterThan(0);
})->skip(fn () => isWindows() === true, 'This feature is not supported on Windows platforms.');

function isWindows(): bool
{
    return str_starts_with(strtoupper(PHP_OS), 'WIN');
}
