<?php

namespace Spatie\CpuLoadHealthCheck\Commands;

use Illuminate\Console\Command;

class CpuLoadHealthCheckCommand extends Command
{
    public $signature = 'cpu-load-health-check';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
