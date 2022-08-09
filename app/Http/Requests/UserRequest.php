<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        $rules = [];
        //lấy phương thức hiện tại
        $currentAcction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAcction) {
                    case 'add':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email:filter|unique:users',
                            'password' => 'required|min:6',
                            'retype_password' => 'required_with:password|same:password|min:6'
                        ];
                    default:
                        break;
                }
                break;
            default:
                break;
        endswitch;

        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute bắt buộc phải nhập',
            'email.required' => ':attribute bắt buộc phải nhập',
            'email.email' => ':attribute không đúng định dạng',
            'email.unique' => ':attribute đã được sử dụng',
            'password.required' => ':attribute bắt buộc phải nhập',
            'password.min' => ':attribute ít nhất phải có :min ký tự',
            'retype_password.same' => ':attribute không trùng khớp'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'retype_password' => 'Nhắc lại mật khẩu'
        ];
    }
}
