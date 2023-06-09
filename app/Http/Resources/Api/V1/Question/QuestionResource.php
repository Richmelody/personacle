<?php

namespace App\Http\Resources\Api\V1\Question;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'questions',
            'attributes' => [
                'category_id' => $this->category->id,
                'question' => $this->question . '?',
                'min_score' => $this->min_score,
                'max_score' => $this->max_score,
                'score_step' => $this->score_step,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
