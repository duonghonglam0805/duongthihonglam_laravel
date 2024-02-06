@extends('layouts.client')
@section('title')
    {{-- <p>{{$title}}</p> --}}
@endsection
@section('content')
    <p>Form thêm sản phẩm</p>
    <form action="" method="POST">
        <input type="text" name="product_name" id="">
        @csrf
        @method('put')
        <button type="submit">Submit</button>
    </form>
@endsection

@section('css')
@endsection


@section('js')

@endsection