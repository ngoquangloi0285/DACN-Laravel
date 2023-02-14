<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter your name!',
            'name.min' => 'Name is too short!',
            'email.required' => 'Please enter your email!',
            'phone.required' => 'Please enter phone number!',
            'address.required' => 'Please enter your address!',
        ];
    }
}
