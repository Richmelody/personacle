<?php

namespace App\Http\Requests\Api\V1\Answer;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            'data.attributes' => 'required|array',
            'data.attributes.*.question_id' => 'required|integer|exists:questions,id|unique:answers,question_id',
            'data.attributes.*.score' => [
                'required',
                'numeric',
                function (string $attribute, mixed $value, \Closure $fail) {
                    $question_key = str($attribute)->before('score')->append('question_id');

                    $question = Question::query()->find($this->input($question_key));

                    if (blank($question) || !in_array($value, \range($question->min_score, $question->max_score, $question->score_step))) {
                        $fail("The {$attribute} must be within the score range for the question.");
                    }
                }
            ],
        ];
    }
}
