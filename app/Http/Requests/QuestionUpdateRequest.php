<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'sometimes',
                'string',
                Rule::unique('questions')->ignore($this->route('question')),
                'min:5',
                'max:255'
            ],
            'body' => 'sometimes|string|min:10|max:2000',
        ];
    }
}
