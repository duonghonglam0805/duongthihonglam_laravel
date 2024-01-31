<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Danh sách sản phẩm";
    }

    /**
     * Show the form for creating a new resource.
     */ 
    //Hiển thị form thêm sản phẩm Phương thucw GET
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    //Xử lý thêm sản phẩm (phương thức post)
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // Lấy ra thông tin 1 sản phẩm (Phương thức GET)
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Hiển thị form sửa sản phẩm (Phương thức GET)
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // Xử lý sửa sản phẩm (Phương thức POST)
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // Xử lý xóa sản phẩm
    public function destroy(string $id)
    {
        //
    }
}
