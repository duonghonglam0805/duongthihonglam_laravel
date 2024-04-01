<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
// use iterable;

class PostController extends Controller
{
    public function index()
    {
        echo '<h2>Query Eloquent Model</h2>';
        $allPosts = Post::all(); // lấy tất cả bản ghi trong class
        // // dd($allPosts);
        // if ($allPosts->count() > 0) //vì két quả trả về collection nên dùng các phương thưc của collection để kiểm tra
        // {
        //     foreach ($allPosts as $item) {
        //         echo $item->title;
        //         echo "<br>";
        //     }
        // }
        // $detail = Post::find(1);
        // dd($detail);
        //Sử dụng query builder

        // $activePosts = DB::table('posts')->where('status', 1)->get();
        // $activePosts = Post::where('status', 1)
        // ->orderBy('id','DESC')
        // ->get();

        // // dd($activePosts);
        // if ($activePosts->count() > 0)
        //  //vì két quả trả về collection nên dùng các phương thưc của collection để kiểm tra
        // {
        //     foreach ($activePosts as $item) {
        //         echo $item->title;
        //         echo "<br>";
        //     }
        // }
        // $allPosts = Post::all();
        // $activePosts=$allPosts->reject(function ($post){ //reject có nghĩa là loại bỏ
        //     // dd($post);
        //     return $post->status==0; //boolean
        // });
        // dd($activePosts);

        //Muốn xử lý dữ liệu lớn, xử dụng phương thức chunk() để tiết kiệm memory. Phương thức sẽ đưa ra nhỏ hơn dữ liệu và cung cấp qua Closure() để xử lý 
        // Post::chunk(2, function($posts){
        //    foreach ($posts as $post){
        //     echo $post->title.'<br>';
        //    } 
        //    echo 'Kết thúc chunk <br>';
        // });
            $allPosts = Post::where('status',1)->cursor();
            foreach($allPosts as $item){
                echo $item->title.'<br>';
            }
    }
}