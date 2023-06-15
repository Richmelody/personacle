<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionByCategoryRequest extends FormRequest
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
            'data.type' => 'required|in:questions',
            'data.attributes' => 'required|array',
            'data.attributes.*.question' => 'required|string',
            'data.attributes.*.min_score' => 'required|integer|different:data.attributes.*.max_score',
            'data.attributes.*.max_score' => 'required|integer|different:data.attributes.*.min_score',
            'data.attributes.*.score_step' => [
                'required',
                'integer',
                "gt:0",
                function (string $attribute, mixed $value, \Closure $fail) {
                    $index = str($attribute)->before('score_step');
                    $min_score = $this->input($index->append('min_score'));
                    $max_score = $this->input($index->append('max_score'));

                    if ($value > \max($min_score, $max_score)) {
                        $fail("The {$attribute} must be less than the maximum score for the question.");
                    }
                }
            ],
        ];
    }
}
