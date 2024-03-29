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
    <form action="{{route('users.post-edit')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="">Họ và tên</label>
            <input type="text" name="fullName" class="form-control" id="" placeholder="Họ và tên....." value="{{old('fullName') ?? $userDetail->name}}">
            @error('fullName')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" id="" placeholder="Email....." value="{{old('email') ?? $userDetail->email}}">
            @error('email')
                <span style="color: red">{{$message}}</span>
            @enderror
        </div> 
        <div class="mb-3">
            <label for="">Nhóm</label>
            <select name="group_id" id="" class="form-control">
                <option value="0">Chọn nhóm</option>
                @if(!empty($allGroups))
                @foreach($allGroups as $item)
                <option value="{{$item->id}}" {{old('group_id') ==$item->id || $userDetail->group_id==$item->id?'selected':false}}>{{$item->name}}</option>
                @endforeach
                @endif
            </select>
            @error('group_id')
            <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Trạng Thái</label>
            <select name="status" id="" class="form-control">
            <option value="0" {{ old('status') == 0 || $userDetail->status== 0 ? 'selected' : 'false' }}> Chưa kích hoạt</option>
                <option value="1" {{old('status') == 1 || $userDetail->status== 1 ?'selected':false}}>Kích hoạt</option>
            </select>
            @error('status')
            <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{route('users.index')}}" class="btn btn-warning">Quay lại</a>
    </form>
    @endsection