<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        //Sử dụng session để kiểm tra login
        // echo "Dishboard khởi động";
    }
    public function index(){
        return '<h2>Dashboard Welcome</h2>';
    }
}
