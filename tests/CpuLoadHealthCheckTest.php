<?php

use Spatie\CpuLoadHealthCheck\Tests\TestClasses\FakeCpuLoadHealthCheck;
use Spatie\Health\Enums\Status;

it('it will run ok when CPU load is low', function () {
    $result = FakeCpuLoadHealthCheck::new()
        ->fakeCpuLoad()
        ->run();

    expect($result->status)->toBe(Status::ok());
});

it('will result in an failure when CPU load is too high', function(float $actualLoad, Status $expectedStatus) {
    $result = FakeCpuLoadHealthCheck::new()
        ->fakeCpuLoad(lastMinute: $actualLoad)
        ->failWhenLoadIsHigherInThePastMinute(1.2)
        ->run();

    expect($result->status)->toBe($expectedStatus);
})->with([
    [1.20, Status::ok()],
    [1.21, Status::failed()],
]);
