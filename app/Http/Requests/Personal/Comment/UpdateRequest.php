<?php

namespace App\Http\Requests\Personal\Comment;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'message'=>'required|string'
        ];
    }
    public function messages(){
        return [
            'message.required'=>'Это поле должно быть заполненным',
            'message.string'=>'Вводимое значение должно быть строчным'
        ];
    }
}