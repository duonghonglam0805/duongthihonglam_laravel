<?php

use Illuminate\Support\Facades\Route;
// use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// // Route::get('/unicode', function () {
// //     // $user = new User();
// //     // $allUser = $user::all();
// //     // dd($allUser);
// //     return view('home');
// // });
// Route::get('/san-pham', function () {
//     return view('product');
// });
// Route::get('/home', function(){
//     $html = '<h1>Học lập trình tại Unicode</h1>';
//     // return 'Home page';
//     return $html;
// });
// Route::get('unicode', function(){
//     return view('form');
//     // return 'Phương thức get của path /unicode';
// });
// Route::post('/unicode', function(){
//     return 'Phương thức post của path /unicode';
// });
// Route::put('/unicode', function(){
//     return 'Phương thức put của path /unicode';
// });
// Route::delete('/unicode', function(){
//     return 'Phương thức detele của path/unicode';
// });
// Route::patch('/unicode', function(){
//     return 'Phương thức Patch của path/unicode';
// });

// Route::match(['get', 'post'], 'unicode', function(){
//     return $_SERVER['REQUEST_METHOD'];
// });

// Route::any('unicode', function(){
//     return $_SERVER['REQUEST_METHOD'];
// });
// Route::any('unicode', function(Request $request){
//     return $request->method();
// });
// Route::get('show-form', function(){
//     return view('form');
// });
// Route::redirect('unicode', 'https://google.com');
// Route::redirect('unicode', 'show-form', 301);

// Route::view('show-form', 'form');
// Route::prefix('admin')->group(function(){
//     Route::get('unicode', function(){
//         return 'Phương thức Get của path/unicode';
//     });
//     Route::get('show-form', function(){
//         return view('form');
//     });
//     Route::prefix('products')->group(function(){
//         Route::get('/', function(){
//             return 'Danh sách sản phẩm';
//         });
//         Route::get('add', function(){
//             return 'Thêm sản phẩm';
//         });
//         Route::get('edit', function(){
//             return 'Sửa sản phẩm';
//         });
//         Route::get('delete', function(){
//             return "Xóa sản phẩm";
//         });
//     });
// });
// Route::view('show-form', 'form');
// Route::prefix('admin')->group(function(){
//     // Route::get('tin-tuc/{id}.html', function($id){ // chỉ lấy id không lấy chuỗi
//     // Route::get('tin-tuc/{slug}-{id}.html', function($slug,$id){
//     // Route::get('tin-tuc/{slug}-{id}.html', function($id, $slug){
//     Route::get('tin-tuc/{id?}/{slug?}', function($id=null, $slug = null){
//         $content = 'Phương thức Get của path/unicode với id: ';
//         $content.= 'id=' . "$id". "<br>";
//         $content.= 'slug=' . "$slug";
//         // $content.= 'slug = ' . "$slug";
//         return $content;
//     });
// });

// Route::view('show-form', 'form');
Route::prefix('admin')->group(function () {
    Route::get('tin-tuc/{slug?}/{id?}.html', function ($slug = null, $id = null) {
        $content = 'Phương thức Get của path/unicode với id: ';
        $content .= 'id=' . "$id" . "<br>";
        $content .= 'slug=' . "$slug";
        return $content;
    })->where(
        [
            'slug' => '[a-z-]+',
            'slug' => '.+', // cũng có thể dùng .+ 
            'id' => '[0-9]+'
        ]
    // có thể dùng where dưới dạng mảng hoặc
    // ->where('id', '[0-9]+')->where('slug', '.+');
    )->name('admin.tintuc');
});

//Đặt tên cho route
// Route::get('/', function(){
//     return view('home');
// })->name('home');
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/tin-tuc', 'App\Http\Controllers\HomeController@getNews')->name('news');
Route::get('/chuyenmuc/{id}', [HomeController::class,'getCategories'])->name('chuyenmuc');
Route::view('show-form', 'form');
Route::prefix('admin')->middleware('checkpermission')->group(function(){
    Route::get('unicode', function(){
        return 'Phương thức Get của path/unicode';
    });
    Route::get('show-form', function(){
        return view('form');
    })->name('admin.show-form');
    Route::prefix('products')->group(function(){
        Route::get('/', function(){
            return 'Danh sách sản phẩm';
        });
        Route::get('add', function(){
            return 'Thêm sản phẩm';
        })->name('admin.product.add');
        Route::get('edit', function(){
            return 'Sửa sản phẩm';
        });
        Route::get('delete', function(){
            return "Xóa sản phẩm";
        });
    });
});