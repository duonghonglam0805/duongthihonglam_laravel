<h1>Thêm chuyên mục</h1>
<form method="POST" action="<?php echo route("categories.add") ;?>">
    <input type="text" name="category_name" placeholder="Tên danh mục...">
    <?php echo csrf_field() ?>
    <!-- <input type="hidden" name="_token" value="<?php csrf_token(); ?>"> -->
    <button type="submit">Thêm danh mục</button>
</form>