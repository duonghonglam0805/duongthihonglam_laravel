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
        DB::enableQueryLog();
        //Lấy tất cả bản ghi của table
        // $lists = DB::table($this->table)->get(); // list này là một mảng
        $id = 5;
        // $lists = DB::table($this->table)
        //     ->select('email', 'name as hoten', 'id', 'created_at')
        //gom nhóm
        // ->where('id', 2)
        // ->where(function($query) use ($id){
        //     $query->where('id', '<', $id)->orWhere('id', '>', $id);
        // })
        // ->where('name', 'like', '%Nguyễn Văn A%')
        // ->whereBetween('id', [3,5])
        // ->whereNotBetween('id', [3,5])
        // ->whereIn('id', [4, 5])
        // ->whereNotIn('id', [4, 5])
        // ->whereNull('update')
        // ->whereNotNull('updated_at')
        // ->whereDate('updated_at', '2024-03-20')
        // ->whereMonth('created_at', '03 ')
        // ->whereMonth('created_at', '11')
        // ->whereYear('created_at', '2024 ')
        // ->whereColumn('created_at','>' ,'update_at')

        // Phần join bảng
        $lists = DB::table('users')
            ->select('users.*', 'groups.name as group_name')
            ->join('groups', 'users.group_id', '=', 'groups.id')
            // ->leftJoin('groups', 'users.group_id', '=', 'groups.id')
            // ->rightJoin('groups', 'users.group_id', '=', 'groups.id')
            ->get();
        // $sql = DB::getQueryLog();
        // dd($sql);

        dd($lists);
        // echo $lists[0]->email;
        // Lấy một bản ghi đầu tiên của table (Lấy thông tin chi tiết)
        $detail = DB::table($this->table)->first();
        // dd($detail->email);
        dd($lists);
    }
}