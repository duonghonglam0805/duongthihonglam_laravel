@extends('layouts.client')
@section('title')
    {{-- <p>{{$title}}</p> --}}
@endsection
@section('content')
    <p>Form thêm sản phẩm</p>
    <form action="" method="POST">
        {{-- Biến $errors sẽ tự động sinh ra nếu như validate in ra lỗi --}}
    @if ($errors->any()) 
        <div class="alert alert-danger text-center">
            {{-- @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach --}}
            {{$errorMessage}}
        </div>
    @endif
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm....." value="{{old('product_name')}}">
            @error('product_name')
                {{-- <span style="color: red">Vui lòng nhập tên sản phẩm</span> --}}
                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Giá sản phẩm</label>
            <input type="text" class="form-control" name="product_price" placeholder="Giá sản phẩm....." value="{{old('product_price')}}">
            @error('product_price')
            <span style="color: red">{{$message}}</span>
        @enderror
        </div>
        @csrf
        {{-- @method('put') --}}
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection

@section('css')
@endsection


@section('js')

@endsection 