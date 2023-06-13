<?php

namespace App\Http\Requests\Question;

use App\Enums\QuestionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuestionRequest extends FormRequest
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
        $min_score = $this->input('data.attributes.min_score');
        $max_score = $this->input('data.attributes.max_score');

        $max_field = \max($min_score, $max_score) === $max_score ? "data.attributes.max_score" : "data.attributes.min_score";

        return [
            'data' => 'required|array',
            'data.type' => 'required|in:questions',
            'data.attributes' => 'required|array',
            'data.attributes.type' => ['required', 'string', Rule::in(QuestionType::values()),],
            'data.attributes.question' => 'required|string',
            'data.attributes.min_score' => 'required|integer|different:data.attributes.max_score',
            'data.attributes.max_score' => 'required|integer|different:data.attributes.min_score',
            'data.attributes.score_step' => ['required', 'integer', "lt:$max_field", "gt:0"],
        ];
    }
}
