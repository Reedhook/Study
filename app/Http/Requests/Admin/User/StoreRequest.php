<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'role'=>'required|integer',

        ];

    }
    public function messages(){
        return [
          'name.required'=>'Это поле должно быть заполненным',
          'name.string'=>'Вводимое значение должно быть строчным',
          'email.required'=>'Это поле должно быть заполненным',
          'email.string'=>'Вводимое значение должно быть строчным',
          'email.email'=>'Введен неправильный формат email',
          'email.unique'=>'Пользователь с такой почтой уже существует',
          'role.required'=>'Вводимое значение должно быть заполнено',
        ];
    }
}
