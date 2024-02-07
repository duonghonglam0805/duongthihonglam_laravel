@extends('layouts.client')
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
    @include('clients.contents.slide')
    @include('clients.contents.about')
    @env('Production')
    <p>Môi trường Production</p>
    @elseenv('test')
    <p>Môi trường test</p>
    @else
    <p>Môi trường dev</p>
    @endenv
@endsection
