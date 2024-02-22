@extends('layouts.client')
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
    {{-- <x-alert/> --}}
    {{-- <x-alert type="danger" /> --}}
    <x-alert type="info" :content="$title" dataIcon="youtube"/>
    {{-- <x-package-alert/> --}}
    {{-- <x-inputs.button/>
    <x-forms.button/> --}}

@endsection
