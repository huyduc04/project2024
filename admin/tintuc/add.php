<div class="row">
    <div class="row frmtitle">
        <h1>THÊM MỚI TIN TỨC</h1>
    </div>

    <div class="row frmcontent">
        <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
        <!-- form thêm mới -->
        <form action="index.php?act=addtintuc" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                <!-- Danh mục tin tức -->
                <strong>Danh mục tin tức</strong><br>
                <select name="iddm">
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="' . $id_danhmuc . '">' . $ten_danhmuc . '</option>';
                    }
                    ?>

                </select>
            </div>
            <!-- Tiêu đề -->
            <div class="row mb10">
                <strong>Tiêu đề</strong><br>
                <input type="text" name="tieude" value="<?= $tieude ?>">
                <span style="color: red"><?= $errTieuDe ?></span>
            </div>

            <!-- Hình ảnh -->
            <div class="row mb10">
                <strong>Hình ảnh</strong><br>
                <input type="file" name="hinh">
                <span style="color:red"><?= $errHinhAnh ?></span>
            </div>

            <!-- Nội dung -->
            <div class="row mb10">
                <strong>Nội dung</strong><br>
                <textarea name="noidung" cols="30" rows="10"><?= $noidung ?></textarea>
                <span style="color:red"><?= $errNoiDung ?></span>
            </div>

            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listtintuc"><input type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
</div>
</div>