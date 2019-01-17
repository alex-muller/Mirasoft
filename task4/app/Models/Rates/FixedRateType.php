<?php

namespace App\Models\Rates;

use App\Models\Lessons\AbstractLesson;

class FixedRateType implements RateInterface
{

    private $rate = 400;

    public function getCost(AbstractLesson $lesson) : int
    {
        return $this->rate;
    }

    public function getType(): string
    {
        return 'fixed';
    }
}