<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepresenterRequest extends FormRequest
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
            'customer_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên người đại diện đã tồn tại!',
            'name.required' => 'Tên người đại diện không được để trống!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'customer_id.required' => 'Vui lòng chọn khách hàng!',
        ];
    }
}
