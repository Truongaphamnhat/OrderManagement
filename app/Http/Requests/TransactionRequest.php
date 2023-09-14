<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
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
            'start_day' => 'required',
            'deadline_day' => 'required',
            'transaction_type' => 'required',
            'customer_id' => 'required',
            'contact_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên giao dịch không được để trống!',
            'start_day.required' => 'Hãy chọn ngày bắt đầu giao dịch!',
            'deadline_day.required' => 'Hãy chọn ngày hoàn thành giao dịch!',
            'transaction_type.required' => 'Hãy chọn loại giao dịch!',
            'customer_id.required' => 'Hãy chọn khách hàng!',
            'contact_id.required' => 'Hãy chọn người liên hệ!',
        ];
    }
}
