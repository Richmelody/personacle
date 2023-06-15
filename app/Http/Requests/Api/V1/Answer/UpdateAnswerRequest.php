<?php

namespace App\Http\Requests\Api\V1\Answer;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /** @var \App\Models\User */
        $user = $this->user();

        return $user->answers()->getQuery()->where('question_id', $this->input('data.attributes.question_id'))->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'data' => 'required|array',
            'data.type' => 'required|in:answers',
            'data.attributes' => 'sometimes|required|array',
            'data.attributes.question_id' => 'sometimes|required|integer|exists:questions,id',
            'data.attributes.score' => [
                'sometimes',
                'required',
                'numeric',
                function (string $attribute, mixed $value, \Closure $fail) {
                    $question = Question::query()->find($this->input('data.attributes.question_id'));

                    if (blank($question) || !in_array($value, \range($question->min_score, $question->max_score, $question->score_step))) {
                        $fail("The {$attribute} must be within the score range for the question.");
                    }
                }
            ],
        ];
    }
}
