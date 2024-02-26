<h2>Học lập trình tại laravel "test"</h2>
@if (session('mess'))
    <div class="alert alert-success">
        {{ session('mess') }}
    </div>
@endif
<form action="" method="POST">
    <input type="text" name="username" id="" placeholder="Username...." value="{{old('username')}}"/>
    <button type="submit">Submit</button>
    @csrf
</form>