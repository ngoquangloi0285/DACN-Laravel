<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'name' => 'required|min:3',
            'metakey' => 'required',
            'metadesc' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng điền tên danh mục!',
            'name.min' => 'Tên quá ngắn!',
            'metakey.required' => 'Vui lòng thêm từ khóa tìm kiếm!',
            'metadesc.required' => 'Vui lòng thêm từ mô tả!',
        ];
    }
}
