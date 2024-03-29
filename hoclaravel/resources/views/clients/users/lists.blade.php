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

<form action="" method="GET">
    <div class="row">
        <div class="col-3 mb-3">
            <select id="" class="form-control" name="status"> 
                <option value="0">Tất cả Trạng thái</option>
                <option value="active" {{request()->status=='active'?'selected':false}}>Kích hoạt</option>
                <option value="inactive"{{request()->status=='inactive'?'selected':false}}>Chưa kích hoạt</option>
            </select>
        </div>
        <div class="col-3 mb-3">
            <select id="" class="form-control" name="group_id">
                <option value="0">Tất cả nhóm</option>
                @if(!empty(getAllGroups()))
                    @foreach(getAllGroups() as $key => $item)
                        <option value="{{$item->id}}"{{request()->group_id==$item->id?'selected':false}}>{{$item->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-4 mb-3">
            <input type="search" class="form-control" placeholder="Từ khóa tìm kiếm..." value="{{request()->keywords}}" name="keywords">
        </div>
        <div class="col-2 mb-3">
            <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
        </div>
    </div>
</form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width= "5%">STT</th>
                <th><a href="?sort-by=name&sort-type={{$sortType}}">Tên</a></th>
                <th><a href="?sort-by=email&sort-type={{$sortType}}">Email</a></th>
                <th>Nhóm</th>
                <th>Trạng thái</th>
                <th width= "25%"><a href="?sort-by=created_at&sort-type={{$sortType}}">Thời gian</a></th>
                <th width = 5%>Sửa</th>
                <th width = 5%>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($usersList))
                @foreach($usersList as $key => $item)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->group_name}}</td>
                    <td>{!!$item->status==0?'<button class= "btn btn-danger btn-sm">Chưa kích hoạt</button>':'<button class= "btn btn-success btn-sm">Đã kích hoạt</button>'!!}</td>
                    <td>{{$item->created_at}}</td>
                    <td><a href="{{route('users.edit', ['id'=>$item->id])}}" class="btn btn-warning btn-sm">Sửa</a></td>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{ route('users.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Xóa</a></td>
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