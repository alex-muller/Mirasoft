<?php

namespace App\Models\Rates;

use App\Models\Lessons\AbstractLesson;

class TimeRateType implements RateInterface
{
    private $rate = 200;

    public function getCost(AbstractLesson $lesson) : int
    {
        return $this->rate * $lesson->getDuration();
    }

    public function getType() : string
    {
        return 'timed';
    }
}