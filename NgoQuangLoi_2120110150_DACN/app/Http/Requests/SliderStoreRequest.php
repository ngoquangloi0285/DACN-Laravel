<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
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
            'title' => 'required|min:3',
            'link' => 'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng điền tên slider!',
            'title.min' => 'Tên quá ngắn!',
            'link.required' => 'Vui lòng điền link slider: https://...',
            'link.min' => 'Đường dẫn không hợp lệ: https://...',
        ];
    }
}
