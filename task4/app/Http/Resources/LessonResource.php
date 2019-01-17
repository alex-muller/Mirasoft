<?php

namespace App\Http\Resources;

use App\Models\Lessons\AbstractLesson;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var AbstractLesson $this */

        return [
            'name' => $this->getLessonType(),
            'rateType' => $this->getRateType(),
            'duration' => $this->getDuration(),
            'price' => $this->getPrice(),
        ];
    }
}
