<?php

namespace App\Http\Requests\Category;

use App\Enums\QuestionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
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
            'data.type' => 'required|in:categories',
            'data.attributes' => 'required|array',
            'data.attributes.type' => ['required', 'string', Rule::in(QuestionType::values())],
            'data.attributes.subtype' => 'required|string',
        ];
    }
}
