<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name'=>'required|string',
            'email' => ['required', 'string', Rule::unique('users')->ignore($this->user)],

            'role'=>'required|integer',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Это поле должно быть заполненным',
            'name.string'=>'Вводимое значение должно быть строчным',
            'email.required'=>'Это поле должно быть заполненным',
            'email.string'=>'Вводимое значение должно быть строчным',
            'email.email'=>'Введен неправильный формата max123@mail.ru',
            'email.unique'=>'Пользователь с такой почтой уже существует',
        ];
    }
}
