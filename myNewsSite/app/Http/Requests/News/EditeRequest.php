<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class EditeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_id'   => ['required', 'numeric', 'exists:categories,id'],
            'title'         => ['required', 'string', 'min:3', 'max:200'],
            'author'        => ['nullable', 'string', 'min:3', 'max:30'],
            'status'        => ['required','string', 'min:3', 'max:7'],
            'source_id'     => ['required', 'numeric', 'exists:sources,id'],
            'image'         => ['nullable', 'image', 'mimes:jpg, png'],
            'description'   => ['nullable', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id'   => 'Категория новости',
            'author'        => 'Автор',
            'source_id'     => 'Источник новости'
        ];
    }

    public function messages(): array
    {
        return [
            'min'   => [
                'string'    => 'Поле :attribute должно быть не меньше :min.',
            ]
        ];
    }
}
