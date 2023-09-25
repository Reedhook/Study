<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title'=>'required|string',
            'content'=>'required|string',
            'category_id'=>'required|exists:categories,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это  поле должно быть заполнено',
            'title.string' => 'Это  поле должно быть заполнено строковым значением',
            'content.required' => 'Это  поле должно быть заполнено',
            'content.string' => 'Это  поле должно быть заполнено строковым значением',
            'category_id.required' => 'Это  поле должно быть заполнено',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'ID категории должен быть в базе данных',
            'image.required' => 'Это  поле должно быть заполнено',
            'image.file' => 'Необходимо выбрать файл',

        ];
    }
}
