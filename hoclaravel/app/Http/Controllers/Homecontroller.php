<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Action index()
    public function index(){
        $title = "Học lập trình web tại unicode";
        $content = "Học laravel 8X tại Unicode nha ok";
        // $dataView = [
        //     'titleData' => $title,
        //     'contentData' => $content,
        // ];
        // có thể sử dụng hàm compact thay cho việc khai báo 1 cái mảng 
        // return view('homepage', compact('title', 'content'));  
        //Hoặc có thể dùng with
        // return view('homepage')->with('title',$title)
        return view('homepage')->with(['title'=>$title, 'content'=>$content]);
        //Hoặc dùng make
        // return View::make('homepage',compact('title', 'content') );
        // return View::make('homepage')->with(['title'=>$title, 'content'=>$content]);
        // $contentView = view('homepage');
        // $contentView = $contentView->render();
        // dd($contentView);
        // return $contentView;
        // return "HOME, Hôm nay học 3 bài nhé Lam";
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
    //
    public function getProductDetail($id){
        // return view('clients.products.detail')->with(['id'=>$id]);
        return view('clients.products.detail', compact('id'));
    }
}
