@extends('layouts.client')
{{-- <h1>Dương Thị Hồng Lam</h1> --}}
@section('title')
    {{$title}}
@endsection
@section('content')
@if(session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
@endif
    <h1>{{$title}}</h1>
    <a href="{{route('users.add')}}" class="btn btn-primary">Thêm người dùng</a>
    <hr >
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width= "5%">STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th width= "25%">Thời gian</th>
                <th width = 5%>Sửa</th>
                <th width = 5%>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($usersList))
                @foreach($usersList as $key => $user)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><a href="{{route('users.edit', ['id'=>$user->id])}}" class="btn btn-warning btn-sm">Sửa</a></td>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Xóa</a></td>
                    </tr> 
                @endforeach        
            @else
                <tr colspan = "6">
                    <td>Không có người dùng</td>
                </tr>
            @endif
        </tbody>
    </table>
    @endsection