<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email:filter|unique:users',
            'password' => 'required|min:6',
            'confirm-password' => 'required_with:password|same:password|min:6'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu nhập ít nhất :min ký tự',
            'confirm-password.required' => 'Vui lòng nhập mật khẩu xác nhận',
            'confirm-password.same' => 'Mật khẩu xác nhận không đúng',
        ];
    }
}
