@extends('layouts.client')
{{-- <h1>Dương Thị Hồng Lam</h1> --}}
@section('title')
    {{$title}}
@endsection
@section('content')
@if(session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
@endif
@if($errors->any())
    <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
@endif
    <h1>{{$title}}</h1>
    <a href="#" class="btn btn-primary">Thêm người dùng</a>
    <hr >
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="">Họ và tên</label>
            <input type="text" name="fullName" class="form-control" id="" placeholder="Họ và tên....." value="{{old('fullName')}}">
            @error('fullName')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" id="" placeholder="Email....." value="{{old('email')}}">
            @error('email')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div> 
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{route('users.index')}}" class="btn btn-warning">Quay lại</a>
    </form>
    @endsection