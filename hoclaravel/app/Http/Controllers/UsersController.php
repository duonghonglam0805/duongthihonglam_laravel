<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Models\Users;

class UsersController extends Controller
{
    //
    private $users;
    public function __construct()
    {
        // $this-> $users= new Users();
        $this->users = new Users();
    }
    public function index()
    {
        $title = 'Danh sách người dùng';
        $users = new Users();
        $usersList = $this->users->getAllUsers();
        return view('clients.users.lists', compact('title', 'usersList'));
    }
    public function add()
    {
        $title = "Thêm người dùng";
        return view('clients.users.add', compact('title'));
    }
    public function postAdd(Request $request)
    {
        $request->validate([
            'fullName' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'fullName.required' => 'Họ và tên bắt buộc phải nhập',
            'fullName.min' => 'Họ tên phải từ :min kí tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống'
        ]);

        $dataInsert = [
            $request->fullName, //fullName là tên name trong form
            $request->email,
            date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công');
    }

    public function getEdit( Request $request, $id = 0)
    {
        $title = "Sửa người dùng";
        if (!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            // dd($userDetail[0]);
            if (!empty($userDetail[0])) {
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
                // dd($userDetail[0]);
                // dd($userDetail);
            } else {
                return redirect()->route('users.index')->with('msg', 'Người dùng này không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
        }
        return view('clients.users.edit', compact('title', 'userDetail'));
    }
    public function postEdit(Request $request)
    {
        $id = session('id');
        if(empty($id)){{
            return back()->with('msg', 'Liên kết không tồn tại');
        }}
        $request->validate([
            'fullName' => 'required|min:5',
            'email' => 'required|email|unique:users,email,' . $id

        ], [
            'fullName.required' => 'Họ và tên bắt buộc phải nhập',
            'fullName.min' => 'Họ tên phải từ :min kí tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại trên hệ thống'
        ]);
        $dataUpdate = [
            $request->fullName,
            $request->email,
            date('Y-m-d H:i:s')
        ];

        // dd($dataUpdate);
        $this->users->updateUser($dataUpdate, $id);
        return back()->with('msg', 'Cập nhật người dùng thành công');
    }
}