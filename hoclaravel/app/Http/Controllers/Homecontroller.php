<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data = [];
    public function index(){
        $this->data['title'] = 'Đào tạo lập trình web';
        return view('clients.home', $this->data);
    }
    public function products(){
        $this->data['title'] = 'Sản phẩm';
        return view('clients.products', $this->data);
    }
  
}
