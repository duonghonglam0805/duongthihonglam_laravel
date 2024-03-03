@extends('layouts.client')
@section('sidebar')
    {{-- @parent  --}}
    <h5>Home Sidebar</h5>
@endsection

@section('content')
    @if(session('nsg'))
        <div class="alert alert-{{session('type')}}">
            {{session('nsg')}}
        </div>
    @endif
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
        <p><img src="https://cf.shopee.vn/file/e73e521bd3ec1b77277d596fee353d75_tn" alt=""></p>
        <p><a href="{{route('dowloadImage').'?image=https://cf.shopee.vn/file/e73e521bd3ec1b77277d596fee353d75_tn'}}" class="btn btn-primary">Dowload ảnh</a></p>
        <p><a href="{{route('dowloadImage').'?image='.public_path('storage/meo.png')}}" class="btn btn-primary">Dowload ảnh</a></p>
        <p><a href="{{route('dowloadPDF').'?file='.public_path('storage/DuongThiHongLam-Final.pdf')}}" class="btn btn-primary">Dowload tài liệu</a></p>
    @section('css')
        <style>
            img{
                max-width: 100%;
                height: auto;
            }
        </style>
    @endsection
@endsection
