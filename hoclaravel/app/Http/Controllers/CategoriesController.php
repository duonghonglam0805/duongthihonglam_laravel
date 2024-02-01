<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        //Sử dụng session để kiểm tra login
        //echo "Categories khởi động";
    }
    //Hiển thị danh sách chuyên mục (Phương thức GET)
    public function index()
    {
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
    public function addCategory(){
        return view('clients/categories/add');
    }
    // Thêm dữ liệu vào chuyên mục (phương thức POST)
    public function handleAddCategory(){
        // return "Submit sửa chuyên mục ok";
        return redirect(route('categories.add'));
    }
    // Xóa dữ liệu (Phương thức DELETE)
    public function deleteCategory($id){
        return "Xóa chuyên mục: " . $id;
    }
}
