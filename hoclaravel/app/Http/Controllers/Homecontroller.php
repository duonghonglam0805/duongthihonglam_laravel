<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use App\Rules\Uppercase;

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

    // Sử dụng Validate
    public function putProducts(Request $request)
    {
        dd($request->all());
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

    // Sử dụng request
    //     public function postProducts(ProductRequest $request)
    //     {
    //         dd($request->all());
    //     }
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

    // sử dụng validator để validate
    // public function postProducts(Request $request)
    // {
    //     // return "ok";
    //     $rules =
    //         [
    //             'product_name' => ['required', 'min:6'],
    //             'product_price' => ['required', 'integer']
    //         ];

    //     $messages =
    //         [
    //             'required' => 'Trường :attribute bắt buộc phải nhập',
    //             'min' => 'Tên sản phẩm không được nhỏ hơn :min kí tự',
    //             // 'required' => ':attribute bắt buộc phải nhập',
    //             'integer' => 'Giá sản phẩm phải là số',
    //         ];
    //     $attributes = [
    //         'product_name' => 'The name of product',
    //         'product_price' => 'Giá sản phẩm'
    //     ];

    //     // $validator = Validator::make($request->all(), $rules, $messages, $attributes);
    //     // $validator->validate(); 
    //     // suer dụng request
    //     $request->validate($rules, $messages);
    //     return response()->json(['status'=>'success']);
    //     // if ($validator->fails()) {
    //     //     $validator->errors()->add('msg', 'Vui lòng kiểm tra lại dữ liệu');
    //     // } else {
    //     //     return redirect()->route('product')->with('msg', 'Validate thành công');
    //     // }
    //     // return back()->withErrors($validator);
    // }
    

// Sử dụng Request
public function postProducts(ProductRequest $request)
{
    $rules =
        [
            'product_name' => ['required', 'min:6'],
            'product_price' => ['required', 'integer']
        ];

    $messages =
        [
            'required' => 'Trường :attribute bắt buộc phải nhập',
            'min' => 'Tên sản phẩm không được nhỏ hơn :min kí tự',
            'integer' => 'Giá sản phẩm phải là số',
        ];
    $attributes = [
        'product_name' => 'The name of product',
        'product_price' => 'Giá sản phẩm'
    ];
    $request->validate($rules, $messages);
    return response()->json(['status'=>'success']);
}
    
    // public function isUppercase($value, $messages, $fail){
    //     if ($value != mb_strtoupper($value, 'UTF-8')){
    //         $fail($messages);
    //     }
    // } // vì đã viết bên file Funcotion.php. Và trên hoàm postProduct không còn gọi this nữa
}