<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //quy ước tên table
    //Tên model là Post=? table: posts
    //Tên model: ProductCategory =>table: product_categories
    protected $table = 'posts'; // Nên đặt là protected. trường hwjp này là quy ước tên table nếu tên table không theo quy ước của laravel
    //quy ước khóa chính. Mặc định laravel sẽ lấy field id làm hóa chính
    protected $primaryKey = 'id';
    //trường hợp khóa chính không phải là khóa chính
    // public $incrementing = false;
    //Thay đổi kiểu dữ liệu cho khóa chính
    // protected $keyType = 'string';
    //Cấu hình timestamp
    public $timestamps = true;
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
    //Cấu hình giá trị mặc định
    protected $attributes = [
        'status' => 0
    ];
    //Cấu hình database connection
    
    
}