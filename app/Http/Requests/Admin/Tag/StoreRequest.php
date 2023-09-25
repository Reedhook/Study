<?php

namespace App\Http\Requests\Admin\Tag;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
            'title'=>'required|string'
        ];
    }
    public function messages(){
        return [
            'title.required'=>'Это поле должно быть заполненным',
            'title.string'=>'Вводимое значение должно быть строчным'
        ];
    }
}
