<?php

namespace Spatie\CpuLoadHealthCheck;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class CpuLoadHealthCheck extends Check
{
    protected ?float $failWhenLoadIsHigherInThePastMinute = null;
    protected ?float $failWhenLoadIsHigherInThePast5Minutes = null;
    protected ?float $failWhenLoadIsHigherInThePast15Minutes = null;

    public function failWhenLoadIsHigherInThePastMinute(float $load): self
    {
        $this->failWhenLoadIsHigherInThePastMinute = $load;

        return $this;
    }

    public function failWhenLoadIsHigherInThePastFiveMinutes(float $load): self
    {
        $this->failWhenLoadIsHigherInThePast5Minutes = $load;

        return $this;
    }

    public function failWhenLoadIsHigherInThePastFifteenMinutes(float $load): self
    {
        $this->failWhenLoadIsHigherInThePast15Minutes = $load;

        return $this;
    }

    public function run(): Result
    {
        $cpuLoad = $this->measureCpuLoad();

        $result = Result::make()->shortSummary(
            "{$cpuLoad->lastMinute} {$cpuLoad->last5Minutes} {$cpuLoad->last15Minutes}");

        $result->ok();

        if ($this->failWhenLoadIsHigherInThePastMinute) {
            if ($cpuLoad->lastMinute > ($this->failWhenLoadIsHigherInThePastMinute)) {
                return $result->failed("The CPU load of the past minute is {$cpuLoad->lastMinute} which is higher than the allowed {$this->failWhenLoadIsHigherInThePastMinute}");
            }
        }

        if ($this->failWhenLoadIsHigherInThePast5Minutes) {
            if ($cpuLoad->lastMinute > ($this->failWhenLoadIsHigherInThePast5Minutes)) {
                return $result->failed("The CPU load of the past 5 minutes is {$cpuLoad->last5Minutes} which is higher than the allowed {$this->failWhenLoadIsHigherInThePast5Minutes}");
            }
        }

        if ($this->failWhenLoadIsHigherInThePast15Minutes) {
            if ($cpuLoad->lastMinute > ($this->failWhenLoadIsHigherInThePast15Minutes)) {
                return $result->failed("The CPU load of the past 15 minutes is {$cpuLoad->last15Minutes} which is higher than the allowed {$this->failWhenLoadIsHigherInThePast15Minutes}");
            }
        }

        return $result;
    }

    protected function measureCpuLoad(): CpuLoad
    {
        return CpuLoad::measure();
    }
}
