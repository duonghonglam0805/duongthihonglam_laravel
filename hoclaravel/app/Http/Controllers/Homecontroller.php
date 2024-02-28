<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'Đào tạo lập trình web';
        return view('clients.home', $this->data);
    }
    public function products()
    {
        $this->data['title'] = 'Sản phẩm';
        return view('clients.products', $this->data);
    }
    public function getProducts()
    {
        $this->data['title'] = 'Thêm sản phẩm';
        $this->data['errorMessage'] = 'Vui lòng kiểm tra lại dữ kiệu';
        return view('clients.add', $this->data);
    }
    public function postProducts(Request $request)
    {
        $rules =
            [
                'product_name' => 'required|min:6',
                'product_price' => 'required|integer'
            ];
        // $message =
        //     [
        //         'product_name.required' => 'Trường :attribute bắt buộc phải nhập',
        //         'product_name.min' => 'Tên sản phẩm không được nhỏ hơn :min kí tự',
        //         'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
        //         'product_price.integer' => 'Giá sản phẩm phải là số',
        //     ];

        $message = [
            'required' => 'Trường :attribute bắt buộc phải nhập',
            'min' => 'Trường :attribute không được nhỏ hơn :min kí tự',
            'integer' => 'Trường :attibute phải là số '
        ];
        $request->validate($rules, $message);
        // $request->validate([
        //     'product_name' => ['required', 'integer', 'min:6'],
        //     'product_price' => 'required|integer'
        // ]);
        // Xử lý việc thêm dữ liệu vào database

    }
    public function putProducts(Request $request)
    {
        dd($request);
    }
    public function getArr()
    {
        $contentArr = [
            'name' => 'Laravel',
            'lesson' => 'Khóa học lập trình laravel',
            'academy' => 'Unicode academy'
        ];
        return $contentArr;
    }
    public function dowloadImage(Request $request)
    {
        if (!empty($request->image)) {
            $image = trim($request->image);
            $fileName = 'image_' . uniqid() . '.png'; //random tên của file ảnh khi lưu về máy
            // $fileName = basename($image); //lấy tên theo tên URL của file ảnh
            // return response()->streamDownload(function () use ($image) {
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // }, $fileName);
            return response()->download($image, $fileName);
        }
    }
    public function dowloadPDF(Request $request)
    {
        if (!empty($request->file)) {
            $file = trim($request->file);
            $fileName = 'file_' . uniqid() . '.pdf'; //random tên của file ảnh khi lưu về máy
            $headers = [
                'Content-Type' => 'application/pdf'
            ];
            return response()->download($file, $fileName, $headers);
        }
    }
}