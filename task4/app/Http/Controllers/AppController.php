<?php

namespace App\Http\Controllers;


use App\Http\Resources\LessonResource;
use App\Models\Lessons\AbstractLesson;
use App\Models\Lessons\EnglishGrammarLesson;
use App\Models\Lessons\EnglishSpeakingLesson;
use App\Models\Rates\FixedRateType;
use App\Models\Rates\TimeRateType;

class AppController
{
    /**
     * Используемые паттерны: "Strategy", "Dependency Injection"
     *
     * Диаграмма классов: task4/Diagram.png
     */
    public function getPrice()
    {
        /** @var AbstractLesson[] $lessons */
        $lessons = [
            new EnglishGrammarLesson(rand(1, 5), new FixedRateType()),
            new EnglishGrammarLesson(rand(1, 5), new TimeRateType()),
            new EnglishSpeakingLesson(rand(1, 5), new FixedRateType()),
            new EnglishSpeakingLesson(rand(1, 5), new TimeRateType()),
        ];

        $total = 0;

        foreach ($lessons as $lesson) {
            $total += $lesson->getPrice();
        }

        return LessonResource::collection(collect($lessons))->additional(['total' => $total]);
    }
}
