<?php

namespace App\Http\Requests\Sources;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'url'   => ['required', 'url', 'min:10', 'max:100']
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
