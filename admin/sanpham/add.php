<div class="row">
    <div class="row frmtitle">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                <strong>Danh mục</strong><br>
                <select name="iddm">
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="' . $id. '">' . $name . '</option>';
                    }
                    ?>

                </select>
            </div>
            <div class="row mb10">
                <strong>Tên sản phẩm</strong><br>
                <input type="text" name="tensp">
            </div>
            <div class="row mb10">
                <strong>Giá sản phẩm</strong><br>
                <input type="text" name="giasp">
            </div>
            <div class="row mb10">
                <strong>Hình ảnh</strong><br>
                <input type="file" name="hinh">
            </div>
            <div class="row mb10">
                <strong>Mô tả</strong><br>
                <textarea name="mota" cols="30" rows="10"></textarea>
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </form>
    </div>
</div>
</div>