<?php

use Illuminate\Support\Facades\Route;
// use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use Whoops\Run;

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
// Route::prefix('admin')->group(function () {
//     Route::get('tin-tuc/{slug?}/{id?}.html', function ($slug = null, $id = null) {
//         $content = 'Phương thức Get của path/unicode với id: ';
//         $content .= 'id=' . "$id" . "<br>";
//         $content .= 'slug=' . "$slug";
//         return $content;
//     })->where(
//         [
//             'slug' => '[a-z-]+',
//             'slug' => '.+', // cũng có thể dùng .+ 
//             'id' => '[0-9]+'
//         ]
//     // có thể dùng where dưới dạng mảng hoặc
//     // ->where('id', '[0-9]+')->where('slug', '.+');
//     )->name('admin.tintuc');
// });

// //Đặt tên cho route
// // Route::get('/', function(){
// //     return view('home');
// // })->name('home');
// Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
// Route::get('/tin-tuc', 'App\Http\Controllers\HomeController@getNews')->name('news');
// Route::get('/chuyenmuc/{id}', [HomeController::class,'getCategories'])->name('chuyenmuc');
// Route::view('show-form', 'form');
// Route::prefix('admin')->middleware('checkpermission')->group(function(){
//     Route::get('unicode', function(){
//         return 'Phương thức Get của path/unicode';
//     });
//     Route::get('show-form', function(){
//         return view('form');
//     })->name('admin.show-form');
//     Route::prefix('products')->group(function(){
//         Route::get('/', function(){
//             return 'Danh sách sản phẩm';
//         });
//         Route::get('add', function(){
//             return 'Thêm sản phẩm';
//         })->name('admin.product.add');
//         Route::get('edit', function(){
//             return 'Sửa sản phẩm';
//         });
//         Route::get('delete', function(){
//             return "Xóa sản phẩm";
//         });
//     });
// });
Route::get('/',[HomeController::class, 'index'])->name('homepage');
// Route::get('/' , function (){
//     return '<h1 style = "text-align: center;">TRANG CHỦ UNICODE</h1>';
// })->name('homepage');

Route::middleware('api.test')->prefix('categories')->group(function(){
    //Danh sách chuyên mục
    Route::get('/',[CategoriesController::class, 'index'])->name('categories.list');
    //Lấy chi tiết 1 chuyên mục (Áp dụng show form chỉnh sửa chuyên mục)
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');
    // Xử lý update chuyên mục
    Route::post('/edit/{id}',[CategoriesController::class, 'updateCategory']);
    //Hiển thị form add dữ liệu
    Route::get('/add',[CategoriesController::class, 'addCategory'])->name('categories.add');
    //Xử lý thêm chuyên mục
    Route::post('/add',[CategoriesController::class, 'handleAddCategory']);
    //Xóa dữ liệu
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');
});

Route::get('san-pham/{id}',[HomeController::class, 'getProductDetail']);
// Route resourse
// Route::prefix("admin")->group(function(){
//     Route::resource('products', ProductsController::class);
// });

//Học Middleware trong laravel
Route::middleware('auth.admin')->prefix("admin")->group(function(){
    Route::get('/', [DashboardController::class,'index']);
    Route::resource('products', ProductsController::class)->middleware('auth.admin.product');
});