@extends('layouts.client')
{{-- <h1>Dương Thị Hồng Lam</h1> --}}
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent 
    <h5>Sidebar childrent</h5>
@endsection
    @section('content')
        <h1>Đây là trang products</h1>
    @endsection
@section('css')
    <style>
        header{
            background: green;
            color : white;
        }
    </style>
@endsection