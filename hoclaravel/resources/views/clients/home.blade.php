@extends('layouts.client')
{{-- <h1>Dương Thị Hồng Lam</h1> --}}
@section('title')
    <p>Header</p>
    {{$title}}
@endsection

@section('sidebar')
    {{-- @parent  --}}
    <h5>Home Sidebar</h5>
@endsection

@section('content')
    <h1>Trang chủ</h1>
    @datetime('2025-03-03 14:03:00')
    @include('clients.contents.slide')
    @include('clients.contents.about')
    @datetime('2034-03-03 14:03:00')
@endsection

@section('css')
@endsection


@section('js')

@endsection