<h1>Upload file</h1>
<form method="POST" action="<?php echo route("categories.upload") ;?>" enctype="multipart/form-data">
   <input type="file" name="photo">
    <?php echo csrf_field() ?>
    <!-- <input type="hidden" name="_token" value="<?php csrf_token(); ?>"> -->
    <button type="submit">Upload</button>
</form>