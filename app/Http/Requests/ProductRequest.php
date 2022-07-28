<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
//        $rules = [];
//        $currentAction = $this->route()->getActionMethod();
//
////        Để lấy phương thức hiện tại
//        switch ($this->method()){
//            case 'POST':
//                switch ($currentAction) {
//                    case 'add':
//                        $rules = [
//                            'name' => 'required',
//                            'cate_id' => 'required',
//                            'image' => 'required',
//                            'price' => 'required',
//                            'description_short' => 'required',
//                            'description' => 'required'
//                        ];
//                        break;
//                    default:
//                        break;
//                }
//                break;
//            default:
//                break;
//        }
//        return $rules;
        return [
            'name' => 'required',
            'cate_id' => 'required',
//            'image' => 'required',
            'price' => 'required',
            'description_short' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute bắt buộc phải nhập',
            'cate_id.required' => ':attribute chưa chọn',
//            'image.required' => ':attribute chưa chọn',
            'price.required' => ':attribute bắt buộc phải nhập',
            'description_short.required' => ':attribute bắt buộc phải nhập',
            'description.required' => ':attribute bắt buộc phải nhập',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'cate_id' => 'Loại sản phẩm',
            'image' => 'Ảnh',
            'price' => 'Giá',
            'description_short' => 'Mô tả ngắn',
            'description' => 'Mô tả chi tiết'
        ];
    }
}
