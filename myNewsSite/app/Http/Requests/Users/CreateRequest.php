<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email'   => ['required', 'email'],
            'password'   => ['required', 'min:8'],
            'is_admin' => [],
            'avatar' => [],
        ];
    }

    public function attributes(): array
    {
        return [
            'name'   => 'Имя пользователя',
            'password'   => 'Пароль',
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
