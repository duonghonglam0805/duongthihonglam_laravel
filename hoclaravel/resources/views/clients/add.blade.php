@extends('layouts.client')
@section('title')
    {{-- <p>{{$title}}</p> --}}
@endsection
@section('content')
    <p>Form thêm sản phẩm</p> 
    <form action="{{route('post-add')}}" method="POST" id="product-form">
        {{-- Biến $errors sẽ tự động sinh ra nếu như validate in ra lỗi --}}
    {{-- @if ($errors->any()) 
        <div class="alert alert-danger text-center">
            {{-- @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach --}}
            {{-- {{$errorMessage}} --}}
        {{-- </div> --}}
    {{-- @endif --}} 
    @error('msg')
        <div class="alert alert-danger text-center" style="display:none ">{{$message}}</div>
    @enderror
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm....." value="{{old('product_name')}}">
                {{-- <span style="color: red">Vui lòng nhập tên sản phẩm</span> --}}
                <span style="color: red"class="error product_name_error"></span>
        </div>
        <div class="mb-3">
            <label for="">Giá sản phẩm</label>
            <input type="text" class="form-control" name="product_price" placeholder="Giá sản phẩm....." value="{{old('product_price')}}">
            <span style="color: red" class="error product_price_error"></span>
        </div>
        @csrf
        {{-- @method('put') --}}
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection

@section('css')
@endsection


@section('js')
    <script>
        $(document).ready(function(){
            // console.log('ok');
            $('#product-form').on('submit', function(e){
                e.preventDefault();
                // alert('ok');
                let productName = $('input[name="product_name"]').val().trim();
                //  alert(prodectName);
                let productPrice = $('input[name="product_price"]').val().trim();
                let actionUrl = $(this).attr('action');
                let csrfToken = $(this).find('input[name="_token"]').val();
                // console.log(csrfToken);
                $('.error').text('');
                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: {
                        product_name: productName,
                        product_price: productPrice,
                        _token: csrfToken
                    },
                    dataType: 'json',
                    success: function (response){
                        console.log(response);
                    },
                    error: function(error){
                        $('.msg').show();
                        // console.log(error);
                        let responseJSON = error.responseJSON.errors;
                        if(Object.keys(responseJSON).length>0){
                            $'.msg'.text(responseJSON.msg)
                            for(let key in responseJSON){
                        $('.' + key + '_error').text(responseJSON[key][0]);
                     }
                        }
                        // console.log(responseJSON);\
                    }
                })
            })
        });
    </script>
@endsection 