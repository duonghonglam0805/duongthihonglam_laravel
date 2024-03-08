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
    public function addUser($data)
    {
        DB::insert('INSERT INTO users (name, email, created_at) VALUE (?, ? , ?)', $data);
    }
    public function getDetail($id)
    {
        return DB::select('SELECT* FROM ' . $this->table . ' WHERE id = ? ', [$id]);
    }
    public function updateUser($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE ' . $this->table . ' SET name = ?, email = ?, updated_at = ? WHERE id = ? ', $data);
    }

    public function deleteUser($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id= ? ", [$id]);
    }
    public function statementUser($sql){
        return DB::statement($sql);
    }
}