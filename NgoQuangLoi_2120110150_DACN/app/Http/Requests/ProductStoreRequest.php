<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'detail' => 'required',
            'price_buy' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'name.min' => 'Tên quá ngắn!',
            'detail.required' => 'Vui lòng nhập thông tin sản phẩm!',
            'price_buy.required' => 'Vui lòng nhập giá bán!',
            'metakey.required' => 'Vui lòng thêm từ khóa tìm kiếm!',
            'metadesc.required' => 'Vui lòng thêm từ mô tả!',
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm!',
            'brand_id.required' => 'Vui lòng chọn thương hiệu sản phẩm!',
        ];
    }
}
