<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //Cho phép là có đồng ý truy suất vào request này hay không
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array // Chứa các rules cần validate
    {
        return [
            //
            'product_name' => 'required|min:6',
            'product_price' => 'required|integer'
        ];
    }

    public function messages()
    {
        return
            [
                'product_name.required' => ' :attribute bắt buộc phải nhập',
                'product_name.min' => ' :attribute không được nhỏ hơn :min kí tự',
                'product_price.required' => ' :attribute Giá sản phẩm bắt buộc phải nhập',
                'product_price.integer' => ' :attribute Giá sản phẩm phải là số'
            ];
    }

    public function attributes()
    {
        return [
            'product_name' => 'Tên sản phẩm',
            'product_price' => 'Giá sản phẩm'
        ];
    }
}