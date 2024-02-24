<?php

use Illuminate\Support\Facades\Route;
// use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Response;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/san-pham', [HomeController::class, 'products'])->name('product');
Route::get('/them-san-pham', [HomeController::class, 'getProducts'])->name('addproduct');
Route::post('/them-san-pham', [HomeController::class, 'postProducts']);
Route::put('/them-san-pham', [HomeController::class, 'putProducts']);
// Route::get('/demo-response', function () {
//     $contentArr = [
//         'name' => 'Laravel',
//         'lesson' => 'Khóa học lập trình laravel',
//         'academy' => 'Unicode academy'
//     ];
//     return $contentArr;
// });
Route::get('/lay-thong-tin', [HomeController::class, 'getArr']);
// Route::get('/demo-response', function () {
//     // $response = new Response(); //sử dụng hàm Response
//     // dd($response);
//     //Sử dụng helper response
//     $response = response();
//     dd($response);
// });

// thay đổi trạng thái của response
Route::get('/demo-response', function () {
    $response = new Response("Học lập trình laravel", 200);
    // $response = response("Học lập trình laravel", 200);
    return $response;
});

// Gán thông tin header vào response
// Route::get('/demo-response', function () {
//     // $content = '<h2>Học lập trình tại Unicode</h2>';
//     // $content = 'Học lập trình tại Unicode';
//     $content = json_encode([
//        'Item1',
//        'Item2',
//        'Item3',
//     ]);
//     $response = (new Response($content))->header('Content-type', 'text/plain'); // Định dạng trả về chuỗi JSON
//     // $response = (new Response($content))->header('Content-type', 'text/plain');
//     // $response = response("Học lập trình laravel", 200);
//     return $response;
// });

// Gán cookie vào response
// Route::get('/demo-response', function () {
//     $response = (new Response())->cookie('Unicode', 'Training PHP-2', 30);
//     return $response;
// });
// // hiện thị cookie ra
// Route::get('/demo-response-2', function (Request $request) {
//     return $request->cookie('Unicode');
// });

// Gán View cho response
Route::get('/demo-response', function () {
    // return view('clients.demo-test');
    $response = response()
        ->view('clients.demo-test', [
            'title' => 'Học HTTP response',
        ], 201)
        ->header('Content-type', 'application/json')
        ->header("API-key", '123456');
    return $response;
});