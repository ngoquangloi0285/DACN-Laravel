<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'detail' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng điền tên danh mục!',
            'title.min' => 'Tên quá ngắn!',
            'detail.required' => 'Vui lòng thêm nội dung!',
            'metakey.required' => 'Vui lòng thêm từ khóa tìm kiếm!',
            'metadesc.required' => 'Vui lòng thêm từ mô tả!',
        ];
    }
}
