<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class KeywordRequest extends FormRequest
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
            'name' => 'required|max:100|min:2',
        ];
    }

    public function messages(){
        return [
            'name.required' => "Từ khóa tìm kiếm không được để trống",
            'name.min' => 'Từ khóa tìm kiếm tối thiểu 2 ký tự',
            'name.max' => 'Từ khóa tìm kiếm tối đa 100 ký tự',
        ];
    }
}
