<?php

namespace App\Models\Rates;

use App\Models\Lessons\AbstractLesson;

interface RateInterface
{
    public function getCost(AbstractLesson $lesson) : int;

    public function getType() : string;
}