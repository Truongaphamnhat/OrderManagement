<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'customer_id' => 'required',
            'position_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            
            'name.required' => 'Tên người liên hệ không được để trống!',
            'email.required' => 'Email không được để trống!',

            'customer_id.required' => 'Tên khách hàng không được để trống!',
           
            'position_id.required' => 'Chức vụ không được để trống!',
            
        ];
    }
}
