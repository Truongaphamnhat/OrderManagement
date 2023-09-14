<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|unique:customers,name,'.$this->id,
            'phone' => 'required',
            'category_id' => 'required',
            'tax_code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên khách hàng đã tồn tại!',
            'name.required' => 'Tên khách hàng không được để trống!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'category_id.required' => 'Danh mục khách hàng không được để trống!',
            'tax_code.required' => 'Mã số thuế không được để trống!',
        ];
    }
}
