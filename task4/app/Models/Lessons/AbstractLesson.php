<?php

namespace App\Models\Lessons;

use App\Models\Rates\AbstractRateType;
use App\Models\Rates\RateInterface;

abstract class AbstractLesson
{
    /**
     * @var int
     */
    private $duration;
    /**
     * @var RateInterface
     */
    private $rateType;

    public function __construct(int $duration, RateInterface $rateType)
    {
        $this->duration = $duration;
        $this->rateType = $rateType;
    }

    public function getDuration() : int
    {
        return $this->duration;
    }

    public function getPrice() : int
    {
        return $this->rateType->getCost($this);
    }

    public function getRateType() : string
    {
        return $this->rateType->getType();
    }

    abstract public function getLessonType() : string;
}