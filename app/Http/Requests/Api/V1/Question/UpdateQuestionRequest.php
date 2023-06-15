<?php

namespace App\Http\Requests\Api\V1\Question;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
            'data' => ['required', 'array'],
            'data.id' => ['required', 'numeric'],
            'data.type' => ['required', 'in:questions'],
            'data.attributes' => ['sometimes', 'required', 'array'],
            'data.attributes.category_id' => ['sometimes', 'integer', 'numeric', 'exists:categories,id'],
            'data.attributes.question' => ['sometimes', 'required', 'string'],
            'data.attributes.min_score' => ['sometimes', 'required', 'integer', 'different:data.attributes.max_score'],
            'data.attributes.max_score' => ['sometimes', 'required', 'integer', 'different:data.attributes.min_score'],
            'data.attributes.score_step' => ['sometimes', 'required', 'integer', "lt:$max_field", "gt:0"],
        ];
    }
}
