<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|max:100|min:2',
            'description' => 'required',
            'content' => 'required',
            'category' => 'required|array',
            'image' => 'required|image',
        ];
    }

    public function messages(){
        return [
            'title.required' => "Tiêu đề không được để trống",
            'title.min' => 'Tiêu đề tối thiểu 2 ký tự',
            'title.max' => 'Tiêu đề tối đa 100 ký tự',
            'description.required' => 'Mô tả không được để trống',
            'content.required' => 'Nội dung không được để trống',
        ];
    }
}
