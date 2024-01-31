<h1 style="text-align: center;">Học Laravel tại unicode</h1>
<?php 
    // echo date2('Y-m-d H:i:s')
    // echo env('APP_ENV');
    // echo config('app.env');
    if(env('APP_ENV')=='production'){
        //Call api live
        echo "Call api live";
    }else{
        //Call api Sandbox
        echo 'Call Api sandbox';
    }
?>
<a href="<?php echo route('admin.show-form') ?>">Show form</a>
<a href="<?php echo route('admin.product.add') ?>">Thêm sản phẩm</a>
<a href="<?php echo route('admin.tintuc', ['id' => 1, 'slug' => 'tin-tuc-the-gioi']); ?>">Xem tin tức</a>
