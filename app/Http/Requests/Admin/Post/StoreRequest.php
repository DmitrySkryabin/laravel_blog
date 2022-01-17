<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо заполнить',
            'title.string' => 'Поле должно содержать строковое значение',
            'content.required' => 'Это поле необходимо заполнить',
            'content.string' => 'Поле должно содержать строковое значение',
            'image.required' => 'Это поле необходимо заполнить',
            'image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле необходимо заполнить',
            'category_id.integer' => 'Поле должно содержать целочисленное значение',
            'category_id.exists' => 'Данные необходимы в базе данных',
            'tag_ids.array' => 'Необходимо отпраить массив данных'
        ];
    }
}
