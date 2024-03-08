<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsersController;

class Users extends Model
{
    use HasFactory;
    //Khai bảo một thuộc tính table
    protected $table = 'users';
    public function getAllUsers()
    {
        $users = DB::select('SELECT * FROM users ORDER BY created_at DESC');
        return $users;
    }
    public function addUser($data){
        DB::insert('INSERT INTO users (name, email, created_at) VALUE (?, ? , ?)', $data);
        
    }
}