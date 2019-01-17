<?php

namespace App\Models\Lessons;

class EnglishGrammarLesson extends AbstractLesson
{

    public function getLessonType() : string
    {
        return 'English Grammar Lesson';
    }
}