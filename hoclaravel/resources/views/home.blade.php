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