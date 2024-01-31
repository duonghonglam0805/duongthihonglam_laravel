<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Action index()
    public function index(){
        return "HOME, Hôm nay học 3 bài nhé Lam";
    }
    // Action getNews
    public function getNews(){
        $date = date('Y-m-d H:i:s');
        return "Danh sách tin tức ngày" . $date;
    }
    //Action getCategories()
    public function getCategories($id){
        return "Chuyên mục: " . $id;
    }
}
