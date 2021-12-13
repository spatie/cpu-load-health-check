<?php

namespace Spatie\CpuLoadHealthCheck;

use Spatie\CpuLoadHealthCheck\Commands\CpuLoadHealthCheckCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CpuLoadHealthCheckServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('cpu-load-health-check')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_cpu-load-health-check_table')
            ->hasCommand(CpuLoadHealthCheckCommand::class);
    }
}
