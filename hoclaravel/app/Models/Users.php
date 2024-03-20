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
    public function statementUser($sql)
    {
        return DB::statement($sql);
    }
    public function learnQueryBuider()
    {
        //Lấy tất cả bản ghi của table
        // $lists = DB::table($this->table)->get(); // list này là một mảng
        $lists = DB::table($this->table)
            ->select('email', 'name as hoten')
            // ->where('id', '=', 5)
            // ->where('id', '>', 2)
            // so sánh and
            // ->where('id', '>', 2)
            // ->where('id', '<', 6)
            // ->where([
            //     [
            //         'id', '>', 2
            //     ],
            //     [
            //         'id', '<', 6
            //     ]
            //     ])
            // ->where([
            //     'id' => 19,
            //     'name' => 'Nguyễn Văn A'
            // ])
            // so sánh and
            ->where('id', 2)
            ->orWhere('id', 6)
            ->get();
        // dd($lists);
        // echo $lists[0]->email;
        // Lấy một bản ghi đầu tiên của table (Lấy thông tin chi tiết)
        $detail = DB::table($this->table)->first();
        // dd($detail->email);
        dd($lists);
    }
}