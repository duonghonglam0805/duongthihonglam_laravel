<?php

namespace App\Http\Requests;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false; //Cho phép là có đồng ý truy suất vào request này hay không
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
    protected function withValidator($validator)
    {
        // dd($validator->errors()->count()); //kiểm tra xem có bao nhiêu lỗi trong danh sách lỗi
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại');
            }
            //    dd('ok');
        });
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'create_at' => date('Y-m-d H:i:s'),
        ]);
    }
    // protected function failedAuthorization()
    // {
    //     throw new AuthorizationException ('Bạn đang truy cập vào khu vực cấp');
    // }

    //chuyển hướng
    protected function failedAuthorization()
    {
        // throw new HttpResponseException (redirect('/')->with('nsg', 'Bạn không có quyền truy cập')->with('type', 'danger'));
        throw new HttpResponseException(abort(404));
    }
    
}