<?php

use Spatie\CpuLoadHealthCheck\Tests\TestClasses\FakeCpuLoadCheck;
use Spatie\Health\Enums\Status;

it('it will run ok when CPU load is low', function () {
    $result = FakeCpuLoadCheck::new()
        ->fakeCpuLoad()
        ->run();

    expect($result->status)->toBe(Status::ok());
});

it('it will use the cpu loads in the short summary', function () {
    $result = FakeCpuLoadCheck::new()
        ->fakeCpuLoad(0.01, 0.02, 0.03)
        ->run();

    expect($result->status)->toBe(Status::ok());
});

it('will result in an failure when CPU load last minute is too high', function (float $actualLoad, Status $expectedStatus) {
    $result = FakeCpuLoadCheck::new()
        ->fakeCpuLoad(lastMinute: $actualLoad)
        ->failWhenLoadIsHigherInTheLastMinute(1.2)
        ->run();

    expect($result->status)->toBe($expectedStatus);
})->with([
    [1.20, Status::ok()],
    [1.21, Status::failed()],
]);

it('will result in an failure when CPU load last 5 minutes is too high', function (float $actualLoad, Status $expectedStatus) {
    $result = FakeCpuLoadCheck::new()
        ->fakeCpuLoad(last5Minutes: $actualLoad)
        ->failWhenLoadIsHigherInTheLast5Minutes(1.2)
        ->run();

    expect($result->status)->toBe($expectedStatus);
})->with([
    [1.20, Status::ok()],
    [1.21, Status::failed()],
]);

it('will result in an failure when CPU load last 15 minutes is too high', function (float $actualLoad, Status $expectedStatus) {
    $result = FakeCpuLoadCheck::new()
        ->fakeCpuLoad(last15Minutes: $actualLoad)
        ->failWhenLoadIsHigherInTheLast15Minutes(1.2)
        ->run();

    expect($result->status)->toBe($expectedStatus);
})->with([
    [1.20, Status::ok()],
    [1.21, Status::failed()],
]);
