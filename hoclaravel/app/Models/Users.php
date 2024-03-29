<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsersController;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Users extends Model
{
    use HasFactory;
    //Khai bảo một thuộc tính table
    protected $table = 'users';
    public function getAllUsers($filters = [], $keywords = null, $sortByArr = null, $perPage = null)
    {
        // DB::enableQueryLog();
        // $users = DB::select('SELECT * FROM users ORDER BY create_at DESC');

        $users = DB::table($this->table)
            ->select('users.*', 'groups.name as group_name')
            ->join('groups', 'users.group_id', '=', 'groups.id');
        $orderBy = 'users.created_at';
        $orderType = 'desc';
        if (!empty($sortByArr) && is_array($sortByArr)) {
            if (!empty($sortByArr['sortBy']) && !empty($sortByArr['sortType'])) {
                $orderBy = trim($sortByArr['sortBy']);
                $orderType = trim($sortByArr['sortType']);
            }
        }
        $users = $users->orderBy($orderBy, $orderType);
        if (!empty($filters)) {
            $users = $users->where($filters);
        }
        if (!empty($keywords)) {
            $users = $users->where(function ($query) use ($keywords) {
                $query->orWhere('name', 'like', '%' . $keywords . '%');
                $query->orWhere('email', 'like', '%' . $keywords . '%');
            });
        }

        if (!empty($perPage)) {
            $users = $users->paginate($perPage);
        } else {
            $users = $users->get();
        }
        // $sql =  DB::getQueryLog();
        // dd($sql);
        return $users;
    }
    public function addUser($data)
    {
        // DB::insert('INSERT INTO users (name, email, created_at) VALUE (?, ? , ?)', $data);
        return DB::table($this->table)->insert($data);
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
        // $lists = DB::table('users')
        // ->select('users.*', 'groups.name as group_name')
        // ->join('groups', 'users.group_id', '=', 'groups.id')
        // ->leftJoin('groups', 'users.group_id', '=', 'groups.id')
        // ->rightJoin('groups', 'users.group_id', '=', 'groups.id')
        // ->orderBy('created_at', 'asc')
        // ->orderBy('id', 'desc')
        // ->inRandomOrder()
        // truy vấn theo nhóm
        // ->select(DB::raw('count(id) as email_count'), 'email')
        // ->groupBy('email')
        // ->having('email_count', '>=' , 2)
        // ->limit(2)
        // ->offset(0)
        // ->take(2)
        // ->skip(2)
        // ->get();
        // $sql = DB::getQueryLog();
        // dd($sql);
        //INSERT DỮ LIỆU VÀO BẢNG

        // $status = DB::table('users')->insert([
        //     'name' => 'Nguyen Van B',
        //     'email' => 'vanb@gamil.com',
        //     'group_id' => '1',
        //     'created_at' => date('Y-m-d H:i:s')
        // ]);

        // $lastId = DB::getPdo()->lastInsertId();
        // dd($lastId);

        // $lastId = DB::table('users')->insertGetId([
        //     'name' => 'Nguyen Van B',
        //     'email' => 'vanb@gamil.com',
        //     'group_id' => '1',
        //     'created_at' => date('Y-m-d H:i:s')
        // ]);
        // dd($lastId);
        // $sql = DB::getQueryLog();
        // dd($sql); 

        // echo $lists[0]->email;
        // Lấy một bản ghi đầu tiên của table (Lấy thông tin chi tiết)
        // $detail = DB::table($this->table)->first();
        // dd($detail->email);
        // dd($lists);

        // Cập nhật bản ghi/ sửa
        // $status = DB::table('users')
        // ->where('id', 13)
        // ->update([
        //     'name' => 'Nguyen Van lam',
        //     'email' => 'vanlam@gamil.com',
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
        // // dd($status);
        //   $sql = DB::getQueryLog();
        //     dd($sql); 

        // Xóa bản ghi
        // $status = DB::table('users')
        // ->where('id', 13)
        // ->delete();
        // dd($status);
        // Đếm số bản ghi
        // $count = DB::table('users')->where('id',  '>', 2)->count();
        // dd($count);
        // DB::raw
        $lists = DB::table('users')
            // ->selectRaw('email, count(id) as email_count')
            // ->groupBy('email')
            // ->groupBy('name')
            // ->where('id', '>' , 2)
            // ->whereRaw('id > ?', [2])
            // ->orderByRaw('created_at DESC')
            // ->groupBy('email')
            // // ->havingRaw('email_count > ?', [2])
            // ->where(
            //     'group_id',
            //     '=',
            //     function ($query) {
            //         $query->select('id')
            //             ->from('groups')
            //             ->where('name', '=', 'Administrator');
            //     }
            // )
            // ->select('email', DB::raw('(SELECT count(id) FROM `groups`) as group_count'))
            ->selectRaw('email, (SELECT count(id) FROM `groups`) as group_count')
            ->get();
        // $users = $users->get();

    }
}