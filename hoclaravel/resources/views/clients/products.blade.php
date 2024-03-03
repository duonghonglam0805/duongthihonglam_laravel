@extends('layouts.client')
{{-- <h1>Dương Thị Hồng Lam</h1> --}}
@section('title')
    {{$title}}
@endsection
{{-- 
@section('sidebar')
    @parent 
    <h5>Products sidebar</h5>
@endsection --}}
@section('content')
@if(session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
@endif
    <h1>Đây là trang products</h1>
    @push('script')
        <script>
            console.log('Phần 2');
        </script>
    @endpush
    {{-- <x-package-alert/> --}}
@endsection

@prepend('script')
<script>
    console.log('Phần 1');
</script>
@endprepend