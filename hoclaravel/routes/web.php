<?php

use Illuminate\Support\Facades\Route;
// use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
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
Route::post('/them-san-pham', [HomeController::class, 'postProducts'])->name('post-add');
Route::put('/them-san-pham', [HomeController::class, 'putProducts']);
// Route::get('/demo-response', function () {
//     $contentArr = [
//         'name' => 'Laravel',
//         'verson' => 'Laravel 8.0',
//         'academy' => 'Unicode academy'
//     ];
//     // return $contentArr;
//     return response()->json($contentArr, 404)->header('Api-Key', '1234');
// });
Route::get('/demo-response', function () {
    return view('clients.demo-test');
})->name('demo-response');
Route::post('/demo-response', function (Request $request) {
    if (!empty($request->username)) {
        // return redirect()->route('demo-response');
        return back()->withInput()->with('mess', 'Validate thành công');
    }
    return redirect(route('demo-response'))->with('mess', 'Validate không thành công');
});
Route::get('download-image', [HomeController::class, 'dowloadImage'])->name('dowloadImage');
Route::get('download-doc', [HomeController::class, 'dowloadPDF'])->name('dowloadPDF');
//Người dùng
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/add', [UsersController::class, 'add'])->name('add');
    Route::post('/add', [UsersController::class, 'postAdd'])->name('post-add');
    Route::get('/edit/{id}', [UsersController::class, 'getEdit'])->name('edit');
    Route::post('/update', [UsersController::class, 'postEdit'])->name('post-edit');
    Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
});