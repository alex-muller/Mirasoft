<?php

namespace App\Models\Lessons;

class EnglishSpeakingLesson extends AbstractLesson
{

    public function getLessonType() : string
    {
        return 'English Speaking Lesson';
    }
}