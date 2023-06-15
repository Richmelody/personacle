<?php

namespace App\Http\Requests\Api\V1\Category;

use App\Enums\QuestionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'data.id' => ['required', 'numeric'],
            'data.type' => 'required|in:categories',
            'data.attributes' => 'sometimes|array',
            'data.attributes.type' => ['sometimes', 'string', Rule::in(QuestionType::values())],
            'data.attributes.subtype' => ['sometimes', 'string', Rule::unique('categories', 'subtype')->ignore($this->input('data.id'))],
        ];
    }
}
