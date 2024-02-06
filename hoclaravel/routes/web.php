<?php

use Illuminate\Support\Facades\Route;
// use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/san-pham',[HomeController::class,'products'])->name('product');
Route::get('/them-san-pham',[HomeController::class,'getProducts'])->name('addproduct');
// Route::post('/them-san-pham',[HomeController::class,'postProducts']);
Route::put('/them-san-pham',[HomeController::class,'putProducts']);