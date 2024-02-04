<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class CategoriesController extends Controller
{
    public function __construct(Request $request)
    {
        /** Nếu là trang danh sách chuyên mục thì hiển thị ra: Hello xin chào unicode*/
        if ($request->is('categories')){
            echo '<h3>XIN CHÀO UNICODE</h3>';
        }
        //Sử dụng session để kiểm tra login
        //echo "Categories khởi động";
    }
    //Hiển thị danh sách chuyên mục (Phương thức GET)
    public function index(Request $request)
    {
        // dd($request);
        // $allData = $request->all();
        // echo $allData['name'];
        // dd($allData);
        // $path = $request->path();
        // echo $path;
        // $url = $request->url();
        // $fullUrl = $request->fullUrl();
        // $method = $request->method();
        // echo $method;
        // if ($request->isMethod('GET')){
        //     echo 'PHương thức GET';
        // }
        // $ip = $request->ip();
        // echo $ip;
        // $server = $request->server();
        // dd($server);
        // $header = $request->header('cookie');
        // dd($header);
        // $id = $request->input('id');
        // echo $id;
        // $id = $request->input();
        // dd($id);
        // $id = $request->input('id')[0];
        // $id = $request->input('id.0.name');
        // $id = $request->input('id.*.name'); //lấy name của cả 2 mảng
        // $id = $request->id;
        // $name = $request->name;
        // echo ($name);
        // echo ($id);

        //Helper
        // dd($request);
        // $id = $request('id');
        // $name = $request('name', 'unicode'); //unicode này tức là một giá trị mặc định khi mà trên url không có giá trị
        // dd($name);
        $id = $request->query('id');
        dd($id);
        $query = $request->query();
        dd($query);
       return view('clients/categories/list');
    }
    // Lấy ra một chuyên mục theo id (phương thức get)
    public function getCategory($id)
    {
        return view('clients/categories/edit');
    }
    // Cập nhật một chuyên mục (PHương thức POST)
    public function updateCategory($id){
        return "Submit sửa chuyên mục id: " . $id;
    }
    //Show form dữ liệu (phương thức GET)
    public function addCategory(Request $request){
        // $path = $request->path();
        // echo $path;
        // $categoryName= $request->old('category_name');
        // echo $categoryName;
        // return view('clients/categories/add', compact('categoryName'));
        return view('clients/categories/add');

    }
    // Thêm dữ liệu vào chuyên mục (phương thức POST)
    public function handleAddCategory(Request $request){
        // return "Submit sửa chuyên mục ok";
        // $allData = $request->all();
        // dd($allData);        
        // if($request->isMethod('POST')){
        //     echo "Phương thức POTS";
        // }
        
        // $category = $request->category_name;
        // $category = $request->id;
        // dd($category);
        if ($request->has('category_name')){
            $category = $request->category_name;
            // dd($category);
            $request->flash();
            return redirect(route('categories.add'));
        }else{
            return 'Không có categoty_name';
        }
        // return redirect(route('categories.add'));
    }
    // Xóa dữ liệu (Phương thức DELETE)
    public function deleteCategory($id){
        return "Xóa chuyên mục: " . $id;
    }
    // xử lý hiển thị form upload
    public function getFile(){
        return view('clients/categories/file');
    }
    //Xử lý lấy thông tin file
    public function handleUploadFile(Request $request){
        // $file = $request->file('photo');
        if ($request->hasFile('photo')){ //Kiểm tra xem file đang được chọn hay chưa
            if ($request->photo->isValid()){
                $file = $request->photo;
                // dd($file);
                // $path = $file->path();
                // dd($path);
                $ext = $file->extension();
                // dd($ext);
                // $path = $request->photo->store('images');
                // $path = $request->photo->store('file', 'local');
                // $path = $request->photo->storeAs('file', 'filename.txt');
                // dd($path);
                // $fileName = $file->getClientOriginalName();
                // dd($fileName);
                // Đổi tên
                $fileName = md5(uniqid()) . '.' . $ext;
                dd($fileName);
            }else{
                return "Upload không thành công";
            }

        }else{
            return "Vui lòng chọn file";
        }
    }
}
